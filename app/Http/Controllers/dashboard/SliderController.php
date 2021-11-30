<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PayUservice\Exception;
use App\Slider;
use Session;

class SliderController extends Controller
{
    public function __construct(Slider $slider)
    {
        $this->exception = 'home';
        $this->slider = $slider;
    }

    public function sliderList()
    {
        try{
            $sliderData = $this->slider->getAllSlider();
            return view('dashboard.slider', compact('sliderData'));
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function sliderAdd(Request $request)
    {
        try{
            if($request->isMethod('post')){
                if($this->slider->saveSlider($request)){
                    Session::flash('msg','Slider add successfully save');
                    Session::flash('alert-class','success');
                    return redirect()->route('slider');
                }else{
                    Session::flash('msg','Unable to add slider');
                    Session::flash('alert-class','danger');
                    return redirect()->route('slider');
                }
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function sliderEdit(Request $request, $id)
    {
        try{
            $slider = Slider::findOrfail($id);
            if($request->isMethod('post')){
                if($this->slider->updateSlider($slider, $request)){
                    Session::flash('msg', 'Slider Update Save successfully!');
                    Session::flash('alert-class', 'success');
                    return redirect()->route('slider');
                }
                else{
                    Session::flash('msg', 'Unable to Save slider..! Try again');
                    Session::flash('alert-class', 'danger');
                    return redirect()->route('slider');
                } 
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function sliderDelete(Request $request, $sliderId)
    {
        try{
            $slider = Slider::findOrfail($sliderId);
            if($this->slider->deleteSlider($slider, $request)){
                Session::flash('msg','Slider successfully delete');
                Session::flash('alert-class','success');
                return redirect()->route('slider');
            }else{
                Session::flash('error-msg','Unable to delete slider.');
                Session::flash('alert-class','danger');
                return redirect()->route('slider');
            }
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }
}
