<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index()
    {
        $latest = Post::latest('created_at')->get()->first();
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        
        return view("posts", [
            'latest' => $latest,
            'posts' => $posts,
        ]);
    }

    public function post($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $next = Post::where('id', '>', $post->id)->get()->first();
        if ($next == null) {
            $next = Post::where('id','<', $post->id)->get()->first();
        }
        return view("post", [
            'post' => $post,
            'next' => $next,
        ]);
    }

    public function store(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
            'body' => 'required|string',
        ],[
            'title.required' => 'Judul wajib diisi',
            'image.required' => 'Gambar wajib diisi',
            'body.required' => 'Isi berita wajib diisi',
        ]);

        $image = $request->file('image');
        $image->storeAs('/public/posts', $request->file('image')->hashName());

        $user->posts()->create([
            'title' => $request->title,
            'image' => $request->file('image')->hashName(),
            'body' => $request->body,
            'user' => $request->user()->id,
        ]);

        $post = Post::latest()->first();

        return redirect()->route('berita.preview')->with([
            'post' => $post,
            'message' => 'Postingan Berhasil Dibuat!',
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image',
            'body' => 'required|string',
        ],[
            'title.required' => 'Judul wajib diisi',
            'image.required' => 'Gambar wajib diisi',
            'body.required' => 'Isi berita wajib diisi',
        ]);


        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('/public/posts', $image->hashName());

            //delete old image
            Storage::delete('/public/posts/' . $post->image);

            $post->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'body' => $request->body,
            ]);

        } else {

            $post->update([
                'title' => $request->title,
                'body' => $request->body,
            ]);
        }

        return redirect()->route('berita.list')->with('message', 'Postingan Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $image = $post->image;
        $pathImage = '/public/posts/' . $image;

        if (Storage::exists($pathImage)) {
            Storage::delete($pathImage);
        }

        $post->delete();
        return redirect()->route('berita.list')->with('message', 'Postingan Berhasil Dihapus!');
    }
}
