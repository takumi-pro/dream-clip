@extends('app')

@section('title', '宣言')

@section('content')
  @include('nav')
  <div class="container py-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card mb-3">
                <div class="card-body">
                  <h2 class="h4 card-title m-0 text-center">宣言</h2>
                </div>
            </div>
            <div class="row">
              @foreach($declarations as $declaration)
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body d-flex flex-row">
                            <a href="" class="text-dark">
                                <i class="fas fa-user-circle fa-3x mr-1"></i>
                            </a>
                        <div>
                        
                        <div class="font-weight-bold">
                            <a href="" class="text-dark">taku</a>
                        </div>
                        <div class="font-weight-lighter">20200929</div>
                    </div>
                    <!-- dropdown -->
                    <div class="ml-auto card-text">
                        <div class="dropdown">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="">
                                <i class="fas fa-pen mr-1"></i>記事を更新する
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-1">
                                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- dropdown -->

                    <!-- modal -->
                    <div id="modal-delete-1" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        を削除します。よろしいですか？
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                        <button type="submit" class="btn btn-danger">削除する</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    </div>
                    <div class="card-body pt-0">
                        <h3 class="h4 card-title">
                        <a class="text-dark d-block" href="">
                            {{ $declaration->title }}
                        </a>
                        </h3>
                        
                    </div>
                 </div>
                </div>
              @endforeach
            </div>
        </div>
     </div>  
  </div>
@endsection




