<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\ImportantTopic;
use App\Contact;
use App\Course;
use App\Topic;
use App\Feedback;
use App\Slider;
use Session;

class WebsiteController extends Controller
{
    public function __construct(Contact $contact, Course $course, Topic $topic, Feedback $feedback, ImportantTopic $importantTopic, Slider $slider)
    {
        $this->exception = '/';
        $this->contact = $contact;
        $this->course = $course;
        $this->topic = $topic;
        $this->feedback = $feedback;
        $this->importantTopic = $importantTopic;
        $this->slider = $slider;
    }

    public function index()
    {
        $getAllClass11Course = $this->course->getAllClass11CoursesList()->take(3);
        $getAllClass12Course = $this->course->getAllClass12CoursesList()->take(3);
        $getAllJEENEETCourses = $this->course->getAllJEENEETCoursesList()->take(3);
        $topicSingleData = $this->topic->getSingleTopic();
        $sliderData = $this->slider->getAllSlider();
        return view('website.index',compact('getAllClass11Course','getAllClass12Course','getAllJEENEETCourses','topicSingleData', 'sliderData'));
    }

    public function course($course)
    {
        $courseData = $this->course->getAllCoureses($course);
        return view('website.course', compact('course','courseData'));
    }

    public function pdfDownload($id)
    {
        $courseDownload = Course::findOrFail($id);
        $file = file_get_contents($courseDownload->pdf);
        $headers = array(
          'Content-Type: application/pdf',
        );
        return response()->download($file, 'filename.pdf' ,$headers);
    }

    public function about()
    {
        return view('website.about');
    }

    public function blog()
    {
        $feedbackData = $this->feedback->getAllFeedback();
        $topicData = $this->topic->getAllTopics();
        $importantTopic = $this->importantTopic->getAllImportantTopic();
        return view('website.blog', compact('topicData', 'feedbackData', 'importantTopic'));
    }

    public function topicDetail($topic)
    {
        $getImportantTopic = $this->importantTopic->SingleimportantTopic($topic);
        return view('website.topic-details', compact('getImportantTopic'));
    }

    public function topics()
    {
        $topicData = $this->topic->getAllTopics();
        return view('website.topics', compact('topicData'));
    }

    public function contact(Request $request)
    {
        try{
            if($request->isMethod('post')){
                $validator = $this->getValidateContact($request->all());
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if($this->contact->saveContact($request)){
                    Session::flash('msg','Thank you for contacting us. We will be in touch with you very soon...');
                    Session::flash('alert-class','success');
                    return redirect()->route('contact');
                }else{
                    Session::flash('msg','Unable to Send contact details.');
                    Session::flash('alert-class','danger');
                }
            }
            return view('website.contact');
        }catch (\Exception $e){
            return redirect()->route($this->exception)->with('warning', $e->getMessage()); 
        }
    }

    public function searchResult(Request $request)
    {
        $data = Topic::select("heading")
                ->where("heading","LIKE","%{$request->input('query')}%")
                ->get();
            $searchData = array();
            foreach ($data as $result)
            {
                $searchData[] = $result->heading;
            }
        return response()->json($searchData);
    }

    public function searchResultData($serachResultData)
    {   
        $searchresults = Topic::where("heading", $serachResultData)
                ->get();
        return view("website.searchresult", compact('searchresults'));
    }

    protected function getValidateContact($data)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required'
        ];
        $errmsg = [
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter email.',
            'mobile.required' => 'Please enter mobile no.'
        ];
        return Validator::make($data, $rules, $errmsg);
    }
}
