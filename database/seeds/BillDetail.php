<?php

use Illuminate\Database\Seeder;

class BillDetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billsdetail')->insert(
            [
            ['id_bill'=>'2','id_product'=>'3', 'quantity'=>'12','unit_price'=>'1000000'],
            ['id_bill'=>'1','id_product'=>'2', 'quantity'=>'10','unit_price'=>'1500000'],
            ['id_bill'=>'2','id_product'=>'4', 'quantity'=>'11','unit_price'=>'1800000'],
            ]
            );
    }
}