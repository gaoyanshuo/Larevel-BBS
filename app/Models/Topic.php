<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }

    public function replies()
    {
        $this->hasMany(Reply::class);
    }

    public function scopeWithOrder($query,$order)
    {
        //不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
    }

    //按照创建时间排序
    public function scopeRecent($query)
    {
        return $query->orderby('created_at','desc');
    }

    //对数据模型 updated_at 时间戳的更新
    public function scopeRecentReplied($query)
    {
        return $query->orderBy('updated_at','desc');
    }

}
