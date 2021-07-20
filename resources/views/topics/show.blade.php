@extends('layouts.app')
@section('title',$topic->title)
@section('content')
@if(session()->has('message'))
  <div class="alert alert-success">
    {{ session()->get('message') }}
  </div>
@endif

<div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
    <div class="card ">
      <div class="card-body">
        <div class="text-center">
          ユーザー名：{{ $topic->user->name }}
        </div>
        <hr>
        <div class="media">
          <div align="center">
            <a href="{{ route('users.show', $topic->user->id) }}">
              <img class="thumbnail img-fluid" src="{{ $topic->user->avatar }}" width="300px" height="300px">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
    <div class="card ">
      <div class="card-body">
        <h1 class="text-center mt-3 mb-3">
          {{ $topic->title }}
        </h1>

        <div class="article-meta text-center text-secondary">
          {{ $topic->created_at->diffForHumans() }}
          ⋅
          <i class="far fa-comment"></i>
          {{ $topic->reply_count }}
        </div>

        <div class="topic-body mt-4 mb-4">
          {!! $topic->body !!}
        </div>

        <div class="operate">
          <hr>
          <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-outline-secondary btn-sm" role="button">
            <i class="far fa-edit"></i> 編集
          </a>

          <form action="{{ route('topics.destroy',$topic->id) }}" method="post" style="display: inline-block;" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-secondary btn-sm">
            <i class="far fa-trash-alt"></i> 削除
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
