<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'post_id', 'category_id'];
    
    public function post(){
        return belongsTo(Post::class);
    }
    
}
