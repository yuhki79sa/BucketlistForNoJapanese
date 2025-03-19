<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\PostLike;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // public function index(){
        
    //   $user_id = Auth::id();
    //   $posts = Post::orderBy('updated_at', 'DESC')->paginate(2);
    // return view('posts.index', compact('posts', 'user_id'));
    // }
    
    
    public function show(Post $post){
        
        $comments = $post->comments()->get();
        
        return view('news.show')->with(['post'=> $post, 'comments'=>$comments]);
    }
    
   public function store(Request $request, Post $post){
       $input=$request['posts'];
       $input['user_id']=auth::id();
       $post->fill($input)->save();
       return redirect('/bucketlist');
   
    }
    
    public function bucketlist(Post $post, Comment $comment){
           $user_id = Auth::id();
           $NoAchieveTodo = $post->where('isdone', false)->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->Paginate(2);
        return view('posts.bucketlist')->with(['posts' => $NoAchieveTodo]);
    }
    
    public function isDone(Post $post){
         $post['isDone']=true;
         $post->save();
         return redirect('/bucketlist');
    }
    
    public function achieve(Post $post){
        $user_id = Auth::id();
        $achieveTodo = $post->where('isdone', true)->where('user_id', $user_id)->orderBy('updated_at', 'DESC')->Paginate(2);
        return view('posts.achievement')->with(['posts' => $achieveTodo]);
    }
    
    public function popular(Request $request){
        
        $user_id = Auth::id();
        
        $keyword = $request->input('keyword');
        $query = Post::query();
        $query->where('todo', 'like', "%$keyword%");
        
        $posts = $query->withCount('likes')->orderBy('likes_count', 'DESC')->paginate(2)->appends(['keyword' => $keyword]);
        return view('posts.popular', compact('posts', 'user_id', 'keyword'));
    }
    
    public function index(Request $request){
        
        $user_id = Auth::id();
        
        $keyword = $request->input('keyword');
        $query = Post::query();
        $query->where('todo', 'like', "%$keyword%");
        
        $posts = $query->orderBy('updated_at', 'DESC')->paginate(2)->appends(['keyword' => $keyword]);
        return view('posts.popular', compact('posts', 'user_id'));
    }
    
    public function destroy(Post $post){
        $post->delete();
        return redirect('/bucketlist');
    }
    
   
    
}
