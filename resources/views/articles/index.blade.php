@extends('app')

@section('title','記事一覧')

@section('content')
 @include('nav')
<div class="container py-4">
  @include('fixed_post')
  <div class="row">
    @include('sidebar')
    
    <div class="col-md-7">
      @foreach($articles as $article)
        @include('articles.card',['col6' => false])
      @endforeach
    </div>
    
  </div>
</div>
  @endsection
