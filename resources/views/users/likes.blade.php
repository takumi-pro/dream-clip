@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
  @include('nav')
  <div class="container py-4">
  @include('fixed_post')
    <div class="row">
      <div class="col-md-10 offset-md-1">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true,'hasDeclarations' => false])
        @foreach($articles as $article)
            @include('articles.card')
          @endforeach
      </div>
    </div>
  </div>
@endsection