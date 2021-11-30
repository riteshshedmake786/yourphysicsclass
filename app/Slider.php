<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Slider extends Model
{
    protected $fillable = [
        'slider_img', 'description'
    ];

    public function getAllSlider()
    {
        return Slider::where(['is_deleted' => 0])->latest('created_at')->get();
    }

    public function saveSlider(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('description');
        if($request->file('slider_img')){
            $data['slider_img'] = $this->imageupload($request->file('slider_img'), 'slider');
        }

        $saveResult = Slider::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function updateSlider(Slider $slider, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('description');
        if($request->file('slider_img')){
            $data['slider_img'] = $this->imageupload($request->file('slider_img'), 'slider');
        }

        $saveResult = $slider->fill($data)->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteSlider(Slider $slider, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $slider->is_deleted = 1;
        $saveResult = $slider->save();
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
