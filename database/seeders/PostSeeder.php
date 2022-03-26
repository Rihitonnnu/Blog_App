<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name'=>'test',
            'title'=>'タイトル',
            'body'=>'本文本文本文本文本文本文本文本文本文本文',
            'created_at'=>'2020-01-01 11:11:11',
        ]);
    }
}
