<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id', 'category_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];

    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }
}
