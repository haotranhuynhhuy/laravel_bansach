<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            ['name'=>'Trần Huỳnh Huy Hào', 'email'=>'tranhuynhhuyhao@gmail.com','password'=>bcrypt('tranhuynhhuyhao'),'quyen'=>'1','phone'=>'0985321412','address'=>'Quận 8'],
            ['name'=>'Trương Gia Đạt', 'email'=>'truonggiadat@gmail.com','password'=>bcrypt('truonggiadat'),'quyen'=>'1','phone'=>'098533632','address'=>'Quận 6'],
            ['name'=>'Nguyễn Lương Gia Huy', 'email'=>'nguyenluonggiahuy@gmail.com','password'=>bcrypt('nguyenluonggiahuy'),'quyen'=>'0','phone'=>'098532188','address'=>'Đồng Nai'],
            ['name'=>'Lê Thế Đức', 'email'=>'letheduc@gmail.com','password'=>bcrypt('letheduc'),'quyen'=>'0','phone'=>'09853888','address'=>'Quận 2'],
            ['name'=>'Dương Hớn Tôn', 'email'=>'duonghonton@gmail.com','password'=>bcrypt('duonghonton'),'quyen'=>'0','phone'=>'09853218848','address'=>'Quận Tân Phú']
            ]);
    }
}
