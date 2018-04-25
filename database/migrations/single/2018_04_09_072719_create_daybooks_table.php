<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaybooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daybooks', function (Blueprint $table) {
            $table->uuid('id')->primary('id');
            $table->string('thetheme');
            $table->string('describe');
            $table->TIMESTAMP('expirationtime');
            $table->string('imgUrl')->nullable($value = true);
            //0大家 1自己
            $table->tinyInteger('who');
            //日记id
            $table->string('diaryid')->nullable($value = true);
            //用户全球唯一id
            $table->string('userid');
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
        Schema::dropIfExists('daybooks');
    }
}
