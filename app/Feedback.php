<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Feedback extends Model
{
    protected $fillable = [
        'img_url', 'name', 'feedback'
    ];

    public function getAllFeedback()
    {
        return Feedback::where(['status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function saveFeedback(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'feedback');
        if($request->file('img_url')){
            $data['img_url'] = $this->imageupload($request->file('img_url'), 'feedback');
        }

        $saveResult = Feedback::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function updateFeedback(Feedback $feedback, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'feedback');
        if($request->file('img_url')){
            $data['img_url'] = $this->imageupload($request->file('img_url'), 'feedback');
        }
        $saveResult = $feedback->fill($data)->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteFeedback(Feedback $feedback, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $feedback->is_deleted = 1;
        $saveResult = $feedback->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    protected function imageupload($selectedimg, $folder){
        $filepath = null;
        $img = $selectedimg;          
        $input['filename'] = time().'.'.$img->getClientOriginalExtension();            
        $destinationPath = public_path('/images/'.$folder);
        if($img->move($destinationPath, $input['filename'])){
            $filepath = url('/images/'.$folder)."/".$input['filename'];
        } 
        return $filepath;
    } 
}
