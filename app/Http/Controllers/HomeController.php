<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Feedback;
use App\Topic;

class HomeController extends Controller
{
    public function __construct(Contact $contact, Feedback $feedback, Topic $topic)
    {
        $this->middleware('auth');
        $this->contact = $contact;
        $this->feedback = $feedback;
        $this->topic = $topic;
    }

    public function index()
    {
        $contacts = $this->contact->getAllContactList()->count();
        $blogData = $this->topic->getAllTopics()->count();
        $feedbackData = $this->feedback->getAllFeedback()->count();
        return view('home', compact('contacts', 'feedbackData', 'blogData'));
    }
}
