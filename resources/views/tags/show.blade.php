@extends('app')

@section('title', $tag->hashtag)

@section('content')
  @include('nav')
  <div class="container py-4">
  <div class="row">
    <div class="col-md-5">
      <div class="row">
        <div class="col-md-10 offset-md-1">
        <ul class="list-group">
          <a href="#!" class="list-group-item list-group-item-action active bg-light border-light text-dark text-center">
          <i class="fas fa-tags"></i>人気のタグ
          </a>
          @foreach($eachTags as $eachtag)
            <a href="{{ route('tags.show',['name' => $eachtag->name]) }}" class="list-group-item list-group-item-action text-primary text-center">#{{ $eachtag->name }}
            <span class="sunny-morning-gradient text-white d-inline-block ml-4" style="width:24px;height:24px;border-radius:50%;">{{ $eachtag->articles->count() }}</span></a>
          @endforeach
        </ul>
        </div>
      </div>  
    </div>
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