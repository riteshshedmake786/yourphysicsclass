<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class ImportantTopic extends Model
{
    protected $fillable = [
        'topic_name', 'topic_img', 'topic_content'
    ];

    public function SingleimportantTopic($topic)
    {
        return ImportantTopic::where(['status' => 0, 'is_deleted' => 0, 'topic_name' => $topic])->first();
    }

    public function getAllImportantTopic()
    {
        return ImportantTopic::where(['status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function saveImportantTopic(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();
        
        $data = $request->only('topic_name', 'topic_content');
        if($request->file('topic_img')){
            $data['topic_img'] = $this->imageupload($request->file('topic_img'), 'topics');
        }

        $saveResult = ImportantTopic::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function updateImportantTopic(ImportantTopic $importantTopic, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('topic_name', 'topic_content');
        if($request->file('topic_img')){
            $data['topic_img'] = $this->imageupload($request->file('topic_img'), 'topics');
        }

        $saveResult = $importantTopic->fill($data)->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteImportantTopic(ImportantTopic $importantTopic, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $importantTopic->is_deleted = 1;
        $saveResult = $importantTopic->save();
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
