
$(function () {
  $('#translate-button').on('click', function() {


    //入力された日本語を取得して、変数textareaに代入
    var textarea = $('#before-translate').val();

    //非同期通信を実行するために、下記の内容でコントローラーに情報を渡す
    $.ajax({
      type: 'POST',
      url: '/translate/ajax',

      //レスポンスを下記のような形式で指定する
      data: {translate: textarea},

      //データ形式をjsonに指定
      dataType: 'json',

      //POSTリクエストのときに必要な記述
      headers :{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

      //レスポンスが正常だったら
    }).done(function(response){
      $('#before-translate').empty();
      $('#after-translate').val(response.translation);
      console.log(response.translation)
      //レスポンスが異常だったら
    }).fail(function(){
      //エラーのアラートを表示
      alert("ajax error, json: " + data);
    });
  });
});
