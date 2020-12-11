@extends('app')

@section('title', '宣言')

@section('content')
  @include('nav')
  <div class="container py-4">
  @include('fixed_dec')
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
              @foreach($declarations as $declaration)
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body d-flex flex-row sunny-morning-gradient">
                            <a href="" class="text-dark">
                                <i class="fas fa-user-circle fa-3x mr-1"></i>
                            </a>
                        <div>
                        <div class="">
                            <a href="{{ route('users.show', ['name' => $declaration->user->name]) }}" class="font-weight-bold text-dark d-inline-block">{{ $declaration->user->name }}</a><span>さんの宣言</span>
                        </div>
                        
                    </div>
                    @if( Auth::id() === $declaration->user_id )
                    <!-- dropdown -->
                    <div class="ml-auto card-text">
                        <div class="dropdown">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('declarations.edit',['declaration' => $declaration]) }}">
                                    <i class="fas fa-pen mr-1"></i>記事を更新する
                                </a>
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
                                <form method="POST" action="{{ route('declarations.destroy',['declaration' => $declaration]) }}">
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
                    @endif
                    </div>
                    <div class="card-body">
                        <h3 class="h4 card-title">
                        <a class="text-dark d-block" href="">
                            {{ $declaration->title }}
                        </a>
                        </h3>
                        <p class="text-right text-muted m-0">宣言期限：<span class="text-primary">{{ $declaration->deadline->format('Y年m月d日') }}</span></p>
                        
                    </div>
                 </div>
                </div>
              @endforeach
            </div>
        </div>
     </div>  
  </div>
@endsection




