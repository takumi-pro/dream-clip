@extends('app')

@section('title',$user->name.'のフォロー中')

@section('content')
 @include('nav')
 <div class="container py-4">
   <div class="row">
      <div class="col-md-10 offset-md-1">
      @include('users.user')
      @include('users.tabs',['hasArticles' => false,'hasLikes' => false])
      @foreach($followings as $person)
      @include('users.person')
      @endforeach
      </div>
   </div>
    
 </div>
@endsection