@csrf
<div class="md-form">
  <p class="text-muted">期限を設定</p>
  <label></label>
  <input type="date" name="deadline" class="form-control" required value="{{ $declaration->deadline ?? old('deadline') }}">
</div>
<div class="form-group">
  <label>宣言内容</label>
  <textarea name="title" required class="form-control" rows="3" placeholder="本文">{{ $declaration->title ?? old('title') }}</textarea>
</div>
