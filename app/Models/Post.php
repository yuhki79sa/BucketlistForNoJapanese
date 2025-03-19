<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        
        'user_id',
        'todo',
        'isDone',
        ];
        
    
     public function likes(){
         return $this->hasMany(PostLike::class);
     }
     
     
     public function comments(){
         return $this->hasMany(Comment::class);
     }
     
     public function choices(){
         return $this->hasMany(Choice::class);
     }
     
     
}