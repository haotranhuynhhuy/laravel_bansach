<?php

use Illuminate\Database\Seeder;

class Customer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert(
            [
            ['name'=>'Trần Huy Kiệt', 'gender'=>'Nam','email'=>'tranhuykiet@gmail.com','address'=>'Quận 8','phone_number'=>'123456789'],
            ['name'=>'Trương Diệp Lệ', 'gender'=>'Nữ','email'=>'truongdieple@gmail.com','address'=>'Quận 6','phone_number'=>'36978542']
            ]
        );
    }
}