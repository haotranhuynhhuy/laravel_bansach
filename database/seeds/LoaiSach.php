<?php

use Illuminate\Database\Seeder;

class LoaiSach extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loaisach')->insert(
            [
            ['name'=>'Giáo dục', 'description'=>'Sách về giáo dục'],
            ['name'=>'Kinh Doanh', 'description'=>'Sách về kinh doanh'],
            ['name'=>'Ngoại ngữ', 'description'=>'Sách về ngoại ngữ'],
            ['name'=>'Chính trị', 'description'=>'Sách về chính trị']
            ]
        );
    }
}