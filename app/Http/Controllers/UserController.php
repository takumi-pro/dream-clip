<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function profeditForm(string $name){
        $user = User::where('name',$name)->first();
        return view('users.profedit',['user' => $user]);
    } 

    public function profedit(Request $request,string $name){
        User::where('name',$name)->update([
            'name' => $request->name,
            'comment' => $request->comment
        ]);

        return redirect()->route('users.show');
    }

    public function show(string $name){
        $user = User::where('name',$name)->first() ->load(['articles.user', 'articles.likes', 'articles.tags']);
        $articles = $user->articles->sortByDesc('created_at');
        $declaration = $user->declarations->sortByDesc('created_at');
        $article_likes = $user->likes->sortByDesc('created_at');
        return view('users.show',[
            'user' => $user,
            'articles' => $articles,
            'declarations' => $declaration,
            'article_likes' => $article_likes,
        ]);   
    }

    public function likes(string $name){
        $user = User::where('name',$name)->first() ->load(['likes.user', 'likes.likes', 'likes.tags']);;
        $articles = $user->likes->sortByDesc('created_at');
        $declaration = $user->declarations->sortByDesc('created_at');

        return view('users.likes',[
            'user' => $user,
            'articles' => $articles,
            'declarations' => $declaration,
        ]);
    }

    public function declarations(string $name){
        $user = User::where('name',$name)->first();
        $articles = $user->likes->sortByDesc('created_at');
        $declaration = $user->declarations->sortByDesc('created_at');

        return view('users.declarations',[
            'user' => $user,
            'articles' => $articles,
            'declarations' => $declaration,
        ]);
    }

    public function followings(string $name){
        $user = User::where('name',$name)->first()->load('followings.followers');
        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings',[
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()->load('followers.followers');

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request,string $name){
        $user = User::where('name',$name)->first();
        
        if($user->id === $request->user()->id){
            return abort('404','Cannot follow yourself');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request,string $name){
        $user = User::where('name',$name)->first();
        
        if($user->id === $request->user()->id){
            return abort('404','Cannot follow yourself');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
