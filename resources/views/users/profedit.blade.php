@extends('app')

@section('title', 'プロフィール編集')

@include('nav')

@section('content')
  <div class="container py-4">
    <div class="row">
      <div class="col-md-11 offset-md-1">
        <div class="card">
          <div class="card-body pt-0">
            
            <div class="card-text">
              <form class="md-form" method="POST" action="{{ route('users.edit',['name' => $user->name]) }}">
                @method('PATCH')
                @csrf
                <div class="file-field">
                  <div class="mb-4 text-center">
                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                      class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar"
                      style="width:150px;height:150px;">
                  </div>
                  <div class="d-flex justify-content-center">
                    <div class="btn btn-mdb-color btn-rounded position-relative p-0">
                      <span class="position-absolute w-100 d-block" style="top:14px;">プロフィール画像設定</span>
                      <input type="file" class="w-100" style="height:45px;opacity:0;">
                    </div>
                  </div>
                </div>
                <div class="md-form mt-3">
                  <input name="name" type="text" id="name" class="form-control" value="{{ $user->name }}">
                  <label for="name">名前</label>
                </div>
                <div class="md-form">
                  <textarea name="comment" id="comment" class="form-control md-textarea" rows="3">{{ $user->comment }}</textarea>
                  <label for="comment">自己紹介</label>
                </div>
                <button type="submit" class="text-white btn blue-gradient btn-block">保存する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
