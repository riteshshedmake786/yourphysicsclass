<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\ImportantTopic;
use Session;

class ImportantTopicController extends Controller
{
    public function __construct(ImportantTopic $importantTopic)
    {
        $this->exception = 'home';
        $this->importantTopic = $importantTopic;
    }

    public function importantTopicView()
    {
        try{
            $importantTopicData = $this->importantTopic->getAllImportantTopic();
            return view('dashboard.important_topic', compact('importantTopicData'));
        }catch(\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    public function importantTopicAdd(Request $request)
    {
        try{
            if($request->isMethod('post')){
                if($this->importantTopic->saveImportantTopic($request)){
                    Session::flash('msg','Topic add successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('important-topic');
                }else{
                    Session::flash('msg','Unable to add topic');
                    Session::flash('alert-class','danger');
                    return redirect()->route('important-topic');
                }
            }
            return view('dashboard.important_topic_add');
        }catch(\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    public function importantTopicEdit(Request $request, $id)
    {
        try{
            $importantTopic = ImportantTopic::findOrfail($id);
            if($request->isMethod('post')){
                if($this->importantTopic->updateImportantTopic($importantTopic, $request)){
                    Session::flash('msg', 'Topic Update Save successfully!');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('important-topic');
                }
                else{
                    Session::flash('msg', 'Unable to Save topic..! Try again');
                    Session::flash('alert-class', 'danger');
                    return redirect()->route('important-topic');
                } 
            }
            return view('dashboard.important_topic_edit', compact('importantTopic'));
        }catch(\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }

    public function importantTopicDelete(Request $request, $importantTopicId)
    {
        try{
            $importantTopic = ImportantTopic::findOrfail($importantTopicId);
            if($this->importantTopic->deleteImportantTopic($importantTopic, $request)){
                Session::flash('msg','Topic successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('important-topic');
            }else{
                Session::flash('error-msg','Unable to delete topic.');
                Session::flash('alert-class','danger');
                return redirect()->route('important-topic');
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}
