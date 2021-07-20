<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //根据分类显示话题列表
    public function show(Category $category)
    {
        //读取分类 ID 关联的话题
        $topics = Topic::where('category_id',$category->id)->paginate(20);
        return view('topics.index',['topics' => $topics,'category' => $category]);
    }
}
