<div class="card mt-0">
    <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x"></i>
          </a>
          @if( Auth::id() !== $user->id )
            <follow-button
              class="ml-auto"
              :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('users.follow',['name' => $user->name]) }}"
            >
            </follow-button>
            @elseif( Auth::id() === $user->id )
              <a href="" style="height:30px;line-height:30px;font-size:14px;" class="px-3 text-primary border border-primary rounded-pill mt-2">プロフィール編集</a>
          @endif 
          
        </div>
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
        <p class="mt-3 mb-0">
          {{ $user->comment }}
        </p>
    </div>
    <div class="card-body">
        <div class="card-text">
          <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted mr-2">
            {{ $user->count_followings }} フォロー
          </a>
          <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
            {{ $user->count_followers }} フォロワー
          </a>
        </div>
    </div>
</div>