<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\Topic;
use Session;

class TopicController extends Controller
{
    public function __construct(Topic $topic)
    {
        $this->exception = 'home';
        $this->topic = $topic;
    }

    public function topicView()
    {
        try{
            $topicData = $this->topic->getAllTopics();
            return view('dashboard.topic', compact('topicData'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function topicAdd(Request $request)
    {
        try{
            if($request->isMethod('post')){
                if($this->topic->saveTopic($request)){
                    Session::flash('msg','Topic add successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('topic');
                }else{
                    Session::flash('msg','Unable to add topic');
                    Session::flash('alert-class','danger');
                    return redirect()->route('topic');
                }
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function topicEdit(Request $request, $id)
    {
        try{
            $topic = Topic::findOrfail($id);
            if($request->isMethod('post')){
                if($this->topic->updateTopic($topic, $request)){
                    Session::flash('msg', 'Topic Update Save successfully!');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('topic');
                }
                else{
                    Session::flash('msg', 'Unable to Save topic..! Try again');
                    Session::flash('alert-class', 'danger');
                    return redirect()->route('topic');
                } 
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function topicDelete(Request $request, $topicId)
    {
        try{
            $topic = Topic::findOrfail($topicId);
            if($this->topic->deleteTopic($topic, $request)){
                Session::flash('msg','Topic successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('topic');
            }else{
                Session::flash('error-msg','Unable to delete topic.');
                Session::flash('alert-class','danger');
                return redirect()->route('topic');
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}
