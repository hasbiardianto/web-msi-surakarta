<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index() {
        $posts = Post::latest()->take(3)->get();
        return view('home', compact('posts'));
    }

    public function about() {
        return view('about');
    }

    public function contact() {
        return view('contact');
    }
}
