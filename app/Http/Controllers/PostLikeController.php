<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostLike;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function likePost(Request $request){
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $alreadyLiked = PostLike::where('user_id', $user_id)->where('post_id', $post_id)->first();
        
        if(!$alreadyLiked){
            $like = new PostLike();
            $like->user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();
        }
        
        else{
            PostLike::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        }
        
        $post = Post::find($post_id);
        $likesCount = $post->likes->count();
        $param = ['likescount' => $likesCount];
        return response()-> json($param);
        
        
    }
}
