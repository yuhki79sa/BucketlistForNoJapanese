<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
     public function impression(Post $post){
        return view('posts.show')->with(['post'=>$post]);
    }


    public function store(PostRequest $request, $postId){
        
        $validatedData = $request->validated();
        
        $comment=new Comment;
        
        $comment->body = $validatedData['body'];
        $comment->URL = $validatedData['URL'];
        $comment->post_id = $postId;
        $comment->save();
        return redirect('achievement');
    } 
    
    public function show(Post $post){
        
        $comments= $post->comments;
        
        return view('achievements.show')->with(['comments'=>$comments]);
    }
}
