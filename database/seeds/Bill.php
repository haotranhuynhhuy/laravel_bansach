<?php

use Illuminate\Database\Seeder;

class Bill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill')->insert(
            [
            ['id_customer'=>'1','total'=>'1000000','payment'=>'COD','note'=>'Giao trước 15 giờ ','status'=>'1'],
            ['id_customer'=>'2','total'=>'1500000','payment'=>'COD','note'=>'Giao trước 20 giờ','status'=>'2']
            ]
        );
    }
}