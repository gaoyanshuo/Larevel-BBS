<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => 'シェア',
                'description' => '一緒にシェアしましょう',
            ],
            [
                'name'        => 'マニュアル',
                'description' => 'マニュアルです',
            ],
            [
                'name'        => 'Q&A',
                'description' => '質問＆答え',
            ],
            [
                'name'        => 'お知らせ',
                'description' => 'お知らせです',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
