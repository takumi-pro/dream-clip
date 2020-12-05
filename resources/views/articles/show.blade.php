@extends('app')

@section('title', '記事詳細')

@section('content')
  @include('nav')
  <div class="container py-4">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        @include('articles.card')
      </div>  
    </div>
  </div>
@endsection