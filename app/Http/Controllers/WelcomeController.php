<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
    	return view('front.home.home-content');
    }

    public function support(){
    	return view('front.support.support-content');
    }

    public function about(){
    	return view('front.about.about-content');
    }

    public function blog(){
    	return view('front.blog.blog-content');
    }

    public function contact(){
    	return view('front.contact.contact-content');
    }

}
