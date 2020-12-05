@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container py-4">
  @include('fixed_post')
  <div class="row">
  @include('sidebar')
    <div class="col-md-7">
      <div class="card mb-3">
        <div class="card-body">
          <h2 class="h4 card-title m-0 text-center">{{ $tag->hashtag }}</h2>
          <div class="card-text text-right">
            {{ $tag->articles->count() }}件
          </div>
        </div>
      </div>
        @foreach($tag->articles as $article)
          @include('articles.card')
        @endforeach
      </div>
  </div>
@endsection