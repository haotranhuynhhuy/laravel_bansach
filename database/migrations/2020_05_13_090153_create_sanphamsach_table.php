<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamsachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sach', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->integer('id_type')->unsigned();
            $table->text('description');
            $table->string('unit_price');
            $table->string('promotion_price')->nullable();
            $table->string('image',255);
            $table->string('unit',255);
            $table->string('spmoi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphamsach');
    }
}