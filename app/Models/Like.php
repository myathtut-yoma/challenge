<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function scopeLikePost($query,$postId)
    {
        Log::info('dd',['aa'=>auth()->id()]);
        return $query->where('post_id', $postId)->where('user_id', auth()->id());
    }
}
