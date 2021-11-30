<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Topic extends Model
{
    protected $fillable = [
        'heading', 'description', 'img_url'
    ];

    public function getSingleTopic()
    {
        return Topic::where(['status' => 0, 'is_deleted' => 0])->latest('created_at')->first();
    }

    public function getAllTopics()
    {
        return Topic::where(['status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function getSearchData(Request $request)
    {
        $data = Topic::select("heading")
                        ->where("heading","LIKE","%{$request->query}%")
                        ->get();
        return response()->json($data);
    }

    public function saveTopic(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('heading', 'description');
        if($request->file('img_url')){
            $data['img_url'] = $this->imageupload($request->file('img_url'), 'topics');
        }

        $saveResult = Topic::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function updateTopic(Topic $topic, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('heading', 'description');
        if($request->file('img_url')){
            $data['img_url'] = $this->imageupload($request->file('img_url'), 'topics');
        }

        $saveResult = $topic->fill($data)->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteTopic(Topic $topic, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $topic->is_deleted = 1;
        $saveResult = $topic->save();
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
