<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function show(string $name){
        $tag = Tag::where('name',$name)->first();
        $eachTags = Tag::withCount('articles')->orderby('articles_count','desc')->take(5)->get();
        return view('tags.show',['tag' => $tag,'eachTags' => $eachTags]);
    }
}
