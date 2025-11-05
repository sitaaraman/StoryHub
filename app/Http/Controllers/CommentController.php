<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    
    public function store(Request $request, $postId)
    {
        // if(!session()->has('user')){
        //     return redirect()->route('user.login');
        // }
        
        $user = $request->session()->get('user_id');
        //  return ($user);
        $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'user_id'=>$user,
            'post_id'=>$postId,
            'comment'=>$request->comment,
        ]);

        return redirect()->route('posts.show', $postId);
    }

    // public function edit($id)
    // {
    //     $comment = Comment::find($id);

    //     if (session('user_id') != $comment->user_id) {
    //         return redirect()->back()->with('error', 'Unauthorized');
    //     }

    //     return view('comments.edit', compact('comment'));
    // }

    
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (session('user_id') != $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $request->validate([
            'comment' => 'required'
        ]);

        $comment->update([
            'comment' => $request->comment
        ]);

         return redirect()->back()->with('success', 'Comment updated');

    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (session('user_id') != $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $post_id = $comment->post_id;

        $comment->delete();

        return redirect()->back()
                ->with('success', 'Comment deleted');
    }
}
