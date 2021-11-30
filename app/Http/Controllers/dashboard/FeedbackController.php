<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\Feedback;
use Session;

class FeedbackController extends Controller
{
    public function __construct(Feedback $feedback)
    {
        $this->exception = 'home';
        $this->feedback = $feedback;
    }

    public function feedbackView()
    {
        try{
            $feedbackData = $this->feedback->getAllFeedback();
            return view('dashboard.feedback', compact('feedbackData'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function feedbackAdd(Request $request)
    {
        try{
            if($request->isMethod('post')){
                if($this->feedback->saveFeedback($request)){
                    Session::flash('msg','Feedback add successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('feedback');
                }else{
                    Session::flash('msg','Unable to add feedback');
                    Session::flash('alert-class','danger');
                    return redirect()->route('feedback');
                }
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function feedbackEdit(Request $request, $id)
    {
        try{
            $feedback = Feedback::findOrfail($id);
            if($request->isMethod('post')){
                if($this->feedback->updateFeedback($feedback, $request)){
                    Session::flash('msg', 'Feedback Update Save successfully!');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('feedback');
                }
                else{
                    Session::flash('msg', 'Unable to Save feedback..! Try again');
                    Session::flash('alert-class', 'danger');
                    return redirect()->route('feedback');
                } 
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function feedbackDelete(Request $request, $feedbackId)
    {
        try{
            $feedback = Feedback::findOrfail($feedbackId);
            if($this->feedback->deleteFeedback($feedback, $request)){
                Session::flash('msg','Feedback successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('feedback');
            }else{
                Session::flash('error-msg','Unable to delete feedback.');
                Session::flash('alert-class','danger');
                return redirect()->route('feedback');
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}
