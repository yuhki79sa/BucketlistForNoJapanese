<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Choice;
use App\Models\ChoiceCategory;

class ChoiceController extends Controller
{
    
    public function choice(Post $post){
        
         $choiceCategories = ChoiceCategory::all();
        
        return view('news.choice')->with(['post'=>$post, 'choiceCategories'=>$choiceCategories]);
    }
    
    public function store(Request $request){
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $choiceCategory_id = $request->choiceCategory_id;
        
        $alreadyChoiced = Choice::where('user_id', $user_id)->where('post_id', $post_id)->where('choiceCategory_id', $choiceCategory_id)->first();
        
        if(!$alreadyChoiced){
        
        $choice = new Choice;
        $choice->user_id = $user_id;
        $choice->post_id = $post_id;
        $choice->choiceCategory_id = $choiceCategory_id;
        $choice->save();
        }
        
        else{
          Choice::where('user_id', $user_id)->where('post_id', $post_id)->where('choiceCategory_id', $choiceCategory_id)->delete();
        }
        
        return redirect('/posts');
        
    }
}
