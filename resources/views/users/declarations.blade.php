@extends('app')

@section('title', $user->name . 'の宣言')

@section('content')
  @include('nav')
  <div class="container py-4">
  @include('fixed_post')
    <div class="row">
      <div class="col-md-10 offset-md-1">
        @include('users.user')
        @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false,'hasDeclarations' => true])
        @foreach($declarations as $declaration)
            

        <div class="card mb-3">
        <div class="card-body d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $declaration->user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x mr-1"></i>
            </a>
            <div>
            
            <div class="font-weight-bold">
            <a href="{{ route('users.show', ['name' => $declaration->user->name]) }}" class="text-dark">
            {{ $declaration->user->name }}
            </a>
            </div>
            <div class="font-weight-lighter">{{ $declaration->created_at->format('Y/m/d H:i') }}</div>
            </div>
        </div>
        <div class="card-body pt-0">
            <h3 class="h4 card-title">
            <a class="text-dark d-block" href="">
                {{ $declaration->title }}
            </a>
            </h3>
            <div class="card-text">
            
            </div>
        </div>
        </div>


        @endforeach
      </div>
    </div>
  </div>
@endsection