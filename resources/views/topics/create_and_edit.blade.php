@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="col-md-10 offset-md-1">
      <div class="card ">

        <div class="card-body">
          <h2 class="">
            <i class="far fa-edit"></i>
            @if($topic->id)
              話題を編集する
            @else
              新しい話題を作る
            @endif
          </h2>

          <hr>

          @if($topic->id)
            <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
            @method('PUT')
          @else
            <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
          @endif
              @csrf

              @include('shared._error')

              <div class="form-group">
                <input class="form-control" type="text" name="title" value="{{ old('title', $topic->title ) }}" placeholder="タイトル" required />
              </div>

              <div class="form-group">
                <select class="form-control" name="category_id" required>
                  <option value="" hidden disabled selected>話題の種類を選択してください</option>
                  @foreach ($categories as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <textarea name="body" class="form-control" id="editor" rows="6" placeholder="内容" required>{{ old('body', $topic->body ) }}</textarea>
              </div>

              <div class="well well-sm">
                    <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" aria-hidden="true"></i> 保存</button>
                  </div>
                </form>
            </form>
        </div>
      </div>
    </div>
  </div>

  @push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
  @endpush

  @push('script')
    <script type="text/javascript" src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/simditor.js') }}"></script>

    <script>
      $(document).ready(function() {
        var editor = new Simditor({
          textarea: $('#editor'),
          upload: {
            url: '{{ route('topics.upload_image') }}',
            params: {
              _token: '{{ csrf_token() }}'
            },
            fileKey: 'upload_file',
            connectionCount: 3,
            leaveConfirm: 'ただ今、ファイルをアップロード中です、画面を閉じらないで下さい'
          },
          pasteImage: true,
        });
      });
    </script>
  @endpush

@endsection
