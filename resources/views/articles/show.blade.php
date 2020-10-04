@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('nav')
  <div class="container">
    <div class="row">
    @include('articles.card')
    </div>
  </div>
@endsection