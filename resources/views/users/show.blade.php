@extends('app')

@section('title', $user->name)

@section('content')
  @include('nav')
  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x"></i>
          </a>
          @if( Auth::id() !== $user->id )
            <follow-button
              class="ml-auto"
              :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('users.follow',['name' => $user->name]) }}"
            >
            </follow-button>
          @endif
        </div>
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <div class="card-text">
          <a href="" class="text-muted">
            {{ $user->count_followings }} フォロー
          </a>
          <a href="" class="text-muted">
            {{ $user->count_followers }} フォロワー
          </a>
        </div>
      </div>
    </div>
    <ul class="nav nav-tabs nav-justified mt-3" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="article-tab" data-toggle="tab" href="#article" role="tab" aria-controls="article"
          aria-selected="true">記事</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="like-tab" data-toggle="tab" href="#like" role="tab" aria-controls="like"
          aria-selected="false">いいね</a>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="article" role="tabpanel" aria-labelledby="article-tab">
        <div class="row">
          @foreach($articles as $article)
            @include('articles.card')
          @endforeach
        </div>
      </div>
      <div class="tab-pane fade" id="like" role="tabpanel" aria-labelledby="like-tab">
        <div class="row">
          @foreach($article_likes as $article)
            @include('articles.card')
          @endforeach
        </div>
      </div>
    </div>

    
  </div>
@endsection




