<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Jetstream;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        $routeName = Route::currentRouteName();
        $totalMessage = Message::count();
        $totalPost = Post::count();
        $totalUser = User::count();
        $tutorial = base_path('/resources/markdown/tutorial.md');

        if ($routeName == "dashboard.berita") {
            return view("admin.posts.index", [
                'total' => $totalPost,
            ]);
        } else {
            return view("admin.dashboard", [
                'totalPost' => $totalPost,
                'totalMessage' => $totalMessage,
                'totalUser' => $totalUser,
                'tutorial' => Str::markdown(file_get_contents($tutorial)),
            ]);
        }
        
    }

    public function posts()
    {
        $posts = Post::orderBy("created_at", "desc")->paginate(10);
        return view("admin.posts.list", [
            "posts" => $posts
        ]);
    }

    public function view($slug)
    {
        
        $post = Post::whereSlug($slug)->firstOrFail();
        return view("admin.posts.view", [
            'post' => $post
        ]);
    }

    public function add()
    {
        return view("admin.posts.create");
    }

    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        return view("admin.posts.update", [
            'post' => $post,
        ]);
    }

    public function preview(Post $post)
    {
        $post = session()->get('post');

        return view("admin.posts.view", [
            'post' => $post,
        ]);
    }

    public function messages()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.messages', [
            'messages' => $messages,
        ]);
    }
}
