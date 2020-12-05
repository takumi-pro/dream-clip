@extends('app')

@section('title','記事一覧')

@section('content')
 @include('nav')
<div class="container py-4">
  <div class="row">
  <div class="col-md-5">
      <div class="row mb-3">
        <div class="col-md-10 offset-md-1">
        <a href="" style="height:75px;font-size:20px;line-height:75px;" class="btn blue-gradient mb-3 m-0 w-100 p-0">
          宣言する<i class="fas fa-comment-dots ml-2"></i>
        </a>
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
    @foreach($articles as $article)
      @include('articles.card',['col6' => false])
    @endforeach
    </div>
    
  </div>
</div>
  @endsection
