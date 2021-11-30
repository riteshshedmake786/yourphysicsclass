<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\Course;
use Session;

class CourseController extends Controller
{
    public function __construct(Course $course)
    {
        $this->exception = 'home';
        $this->course = $course;
    }

    public function courseView($section)
    {
        try{
            $courseData = $this->course->getAllCoureses($section);
            return view('dashboard.course', compact('section','courseData'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function courseAdd(Request $request, $section)
    {
        try{
            if($request->isMethod('post')){
                if($this->course->saveCourse($request)){
                    Session::flash('msg','Course add successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('course', ['section' => $section]);
                }else{
                    Session::flash('msg','Unable to add course');
                    Session::flash('alert-class','danger');
                    return redirect()->route('course');
                }
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function courseEdit(Request $request, $id)
    {
        try{
            $course = Course::findOrfail($id);
            if($request->isMethod('post')){
                if($this->course->updateCourse($course, $request)){
                    Session::flash('msg', 'Course Update Save successfully!');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('course', ['section' => $course->class]);
                }
                else{
                    Session::flash('msg', 'Unable to Save Course..! Try again');
                    Session::flash('alert-class', 'danger');
                    return redirect()->route('course');
                } 
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function courseDelete(Request $request, $courseId)
    {
        try{
            $course = Course::findOrfail($courseId);
            if($this->course->deleteCourse($course, $request)){
                Session::flash('msg','Course successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('course', ['section' => $course->class]);
            }else{
                Session::flash('error-msg','Unable to delete course.');
                Session::flash('alert-class','danger');
                return redirect()->route('course', ['section', $course->class]);
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}
