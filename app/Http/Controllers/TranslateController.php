<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Translate\V2\TranslateClient;
class TranslateController extends Controller
{


    public function translate(Request $request)
    {

        if (!empty($request->before_translate)) {
            //TranslateClientクラスの呼び出し

            $projectId = 'festive-radar-320502';
            $apiKey = 'AIzaSyBSbGCnHTgWRYZfxjvkvV5o21ZR7oLrv9M';

            $translate = new TranslateClient([
                'projectId' => $projectId,
                'key' => $apiKey
            ]);

            //翻訳したい言語を指定。「日本語→英語」
            $lang = "en";

            //翻訳開始
            $result = $translate->translate($request->before_translate, [
                'target' => $lang,
            ]);

            //翻訳結果を取得
            $translation = $result['text'];
//            dd(response()->json(['translation' => $translation]));
            //レスポンスをJSONで返すように設定
            return response()->json(['translation' => $translation]);
        } else {
            return redirect()->back();
        }
    }

    public function test()
    {
        return view('translate.translate');
    }
}
