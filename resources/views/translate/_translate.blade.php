
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Document</title>
</head>
<body>
<form action="{{route('translate.translate')}}" method="post" id="translate-form">
  @csrf
  <div class="form-group">
    <label for="text" class="control-label">Japanese</label>
    <textarea class="form-control" name="before_translate" id ="before-translate" style="padding-bottom: 10vh; border-radius: 20px;"></textarea>
    <div class="text-right">
      <button class="btn" type="submit" id="translate-button" style="color: #5476AA;">
        <i class="fas fa-language fa-2x"></i>
      </button>
    </div>
  </div>
</form>

<div class="form-group" >
  <label  class="control-label">English</label>
  <textarea  class="form-control" id="after-translate" name="after_translate" style="padding-bottom: 10vh; border-radius: 20px;"></textarea>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/translate.js') }}"></script>
</body>
</html>
