@extends('app')

@section('title','記事一覧')

@section('content')
 @include('nav')
<div class="container">
  <div class="row">
  @foreach($articles as $article)
    @include('articles.card')
  @endforeach
    </div>
  </div>
  @endsection
