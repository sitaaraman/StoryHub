<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create(Request $request)
    {
        if($request->session()->has('user_id')){
            return view('posts.create');
        } 
    }

    public function store(Request $request)
    {
        if($request->session()->has('user_id'))
        {
            $request->validate([
                'title' => 'required',
                'body' => 'required',
            ]);

            $user = $request->session()->get('user_id');
            if($request->hasFile('title')) {
                $file = $request->file('title');
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/posts'), $fileName);
            }

            Post::create([
                'user_id' => $user->id,
                'title' => $fileName,
                'body' => $request->body,
            ]);

            return redirect()->route('posts.index');
        }
    }
    // , 'comment.user' value="{{ $post->title }}"

    public function show($postId)
    {
        $post = Post::with('user', 'comments.user')->find($postId);
        return view('posts.show', compact('post'));

    }

    public function edit(Request $request, $postId)
    {
        if(!$request->session()->has('user_id')) {
            return redirect()->route('user.login')->with('error', 'login required');
        }

        $user = $request->session()->get('user_id');
        $post = Post::find($postId);

        if($post->user_id != $user->id) {
            return redirect()->route('posts.index')->with('error', 'unauthorized access');
            
        }

        return view('posts.edit', compact('post'));

    }

    public function update(Request $request, $postId)
    {
        if(!$request->session()->has('user_id')) {
            return redirect()->route('user.login')->with('error', 'login required');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $user = $request->session()->get('user_id');
        $post = Post::find($postId);

        if($post->user_id != $user->id) {
            return redirect()->route('posts.index')->with('error', 'unauthorized access');
        }

        if($request->hasFile('title')) {
                $file = $request->file('title');
                $fileName = time().'_'.$file->getClientOriginalName();
                $file->move(public_path('images/posts'), $fileName);
        }

        $updatePost=[
                'title' => $fileName,
                'body' => $request->body,
        ];

        $post->update($updatePost);

        return redirect()->route('posts.show', $postId)->with('success', 'post updated');        

    }

    public function destroy(Request $request, $postId){
        
        if(!$request->session()->has('user_id')){
            return redirect()->route('user.login');
        }

        $user = $request->session()->get('user_id');
        $post = Post::find($postId);

        if($post->user_id != $user->id)
        {
            return redirect()->route('posts.index');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

}
