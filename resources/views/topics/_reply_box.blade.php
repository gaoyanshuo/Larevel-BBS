@include('shared._error')

<div class="reply-box">
  <form action="{{ route('replies.store') }}" method="POST" accept-charset="UTF-8">
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    @csrf
    <div class="form-group">
      <textarea class="form-control" rows="3" placeholder="コメント" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share mr-1"></i> 回复</button>
  </form>
</div>
<hr>
