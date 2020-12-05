@extends('app')

@section('title', '宣言')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            
            <div class="card-text">
              <form method="POST" action="{{ route('declaration.store') }}">
                
                <button type="submit" class="text-white btn sunny-morning-gradient btn-block">宣言する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
