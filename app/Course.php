<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Course extends Model
{
    protected $table = 'courses';
    
    protected $fillable = [
        'class', 'heading', 'youtube_url', 'description', 'pdf'
    ];

    public function getAllCoureses($section)
    {
        return Course::where(['status' => 0, 'is_deleted' => 0, 'class' => $section])->latest('created_at')->get();
    }

    public function getAllClass11CoursesList()
    {
        return Course::where(['class' => 'class-11','status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function getAllClass12CoursesList()
    {
        return Course::where(['class' => 'class-12','status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function getAllJEENEETCoursesList()
    {
        return Course::where(['class' => 'JEE-NEET','status' => 0, 'is_deleted' => 0])->latest('created_at')->get();
    }

    public function saveCourse(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('class', 'heading', 'youtube_url', 'description');
        if($request->file('pdf')){
            $data['pdf'] = $this->pdfupload($request->file('pdf'), $data['class']);
        }

        $saveResult = Course::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;  
    }

    public function updateCourse(Course $course, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('class', 'heading', 'youtube_url', 'description');
        if($request->file('pdf')){
            $data['pdf'] = $this->pdfupload($request->file('pdf'), $data['class']);
        }

        $saveResult = $course->fill($data)->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteCourse(Course $course, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $course->is_deleted = 1;
        $saveResult = $course->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    protected function pdfupload($selectedpdf, $folder){
        $filepath = null;
        $pdf = $selectedpdf;          
        $input['filename'] = time().'.'.$pdf->getClientOriginalExtension();            
        $destinationPath = public_path('/pdf/'.$folder);
        if($pdf->move($destinationPath, $input['filename'])){
            $filepath = url('/pdf/'.$folder)."/".$input['filename'];
        } 
        return $filepath;
    } 
}
