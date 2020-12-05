<div class="col-md-5">
      <div class="row mb-3">
        <div class="col-md-11 pull-right col-md-pull-1">
          <div class="btn-group m-0 w-100" role="group" aria-label="Basic example">
            <a href="{{ route('declaration.create') }}" type="button" style="height:65px;font-size:16px;line-height:65px;" class="btn sunny-morning-gradient mb-3 m-0 w-100 p-0 text-white">
              宣言する<i class="fas fa-comment-dots ml-2"></i>
            </a>
            <a href="{{ route('declaration') }}" type="button" style="height:65px;font-size:16px;line-height:65px;" class="btn sunny-morning-gradient mb-3 m-0 w-100 p-0 text-white">
              皆の宣言<i class="fas fa-comment-dots ml-2"></i>
            </a>
          </div>
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