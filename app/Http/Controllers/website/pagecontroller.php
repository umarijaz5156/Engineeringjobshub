<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Services\Website\IndexPageService;
use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    //

    public $setting;

    public function __construct()
    {
        $this->setting = loadSetting(); // see helpers.php
    }


    public function mechanical(){
        try {
            $data = (new IndexPageService())->execute();
            $data['mechanical'] = Job::where('title', 'like', '%mechanical%')->take(8)->get();
            return view('frontend.pages.content.mechanical', $data);

        } catch (\Exception $e) {
            flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }


    public function civil(){
        try {
            $data = (new IndexPageService())->execute();
            $data['mechanical'] = Job::where('title', 'like', '%civil%')->take(8)->get();
            return view('frontend.pages.content.civil', $data);

        } catch (\Exception $e) {
            flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }

    public function electrical(){
        try {
            $data = (new IndexPageService())->execute();
            $data['electrical'] = Job::where('title', 'like', '%electrical%')->take(8)->get();
            return view('frontend.pages.content.electrical', $data);

        } catch (\Exception $e) {
            flashError('An error occurred: '.$e->getMessage());

            return back();
        }
    }

}
