<?php

use Illuminate\Support\Facades\Route;

// website routes
Route::get('/', 'WebsiteController@index')->name('index');
Route::get('/about', 'WebsiteController@about')->name('about');
Route::get('/blogs', 'WebsiteController@blog')->name('blogs');
Route::get('/topics', 'WebsiteController@topics')->name('topics');
Route::get('/topic-details/{topic}', 'WebsiteController@topicDetail')->name('topic-details');
Route::get('/class/{course}', 'WebsiteController@course')->name('class');
Route::get('/pdf-download/{id}', 'WebsiteController@pdfDownload')->name('pdf-download');
Route::match(['get','post'],'/contact', 'WebsiteController@contact')->name('contact');
Route::get('/search', 'WebsiteController@searchResult')->name('search');
Route::get('/search-result/{searchvalue}', 'WebsiteController@searchResultData')->name('search-result');


// dashboard routes
Auth::routes();

// home route
Route::get('/home', 'HomeController@index')->name('home');

// contact route
Route::get('contact-list', 'dashboard\ContactController@contactList')->name('contact-list');
Route::get('contact-delete/{cid}', 'dashboard\ContactController@contactDelete')->name('contact-delete');

// slider routes
Route::get('slider', 'dashboard\SliderController@sliderList')->name('slider');
Route::match(['get','post'],'slider-add', 'dashboard\SliderController@sliderAdd')->name('slider-add');
Route::match(['get','post'],'slider-edit/{sid}', 'dashboard\SliderController@sliderEdit')->name('slider-edit');
Route::get('slider-delete/{deleteId}', 'dashboard\SliderController@sliderDelete')->name('slider-delete');

// courses routes
Route::get('course/{section}', 'dashboard\CourseController@courseView')->name('course');
Route::match(['get', 'post'],'course-add/{section}', 'dashboard\CourseController@courseAdd')->name('course-add');
Route::match(['get','post'], 'course-edit/{id}', 'dashboard\CourseController@courseEdit')->name('course-edit');
Route::get('course-delete/{deleteId}', 'dashboard\CourseController@courseDelete')->name('course-delete');

// topic routes
Route::get('topic', 'dashboard\TopicController@topicView')->name('topic');
Route::match(['get', 'post'],'topic-add', 'dashboard\TopicController@topicAdd')->name('topic-add');
Route::match(['get', 'post'],'topic-edit/{tid}', 'dashboard\TopicController@topicEdit')->name('topic-edit');
Route::get('topic-delete/{deleteId}', 'dashboard\TopicController@topicDelete')->name('topic-delete');

// important routes
Route::get('/important-topic', 'dashboard\ImportantTopicController@importantTopicView')->name('important-topic');
Route::match(['get','post'],'/important-topic-add', 'dashboard\ImportantTopicController@importantTopicAdd')->name('important-topic-add');
Route::match(['get','post'],'/important-topic-edit/{id}', 'dashboard\ImportantTopicController@importantTopicEdit')->name('important-topic-edit');
Route::get('important-topic-delete/{deleteId}', 'dashboard\ImportantTopicController@importantTopicDelete')->name('important-topic-delete');

// feedback routes
Route::get('feedback', 'dashboard\FeedbackController@feedbackView')->name('feedback');
Route::match(['get', 'post'],'feedback-add', 'dashboard\FeedbackController@feedbackAdd')->name('feedback-add');
Route::match(['get', 'post'],'feedback-edit/{id}', 'dashboard\FeedbackController@feedbackEdit')->name('feedback-edit');
Route::get('feedback-delete/{deleteId}', 'dashboard\FeedbackController@feedbackDelete')->name('feedback-delete');