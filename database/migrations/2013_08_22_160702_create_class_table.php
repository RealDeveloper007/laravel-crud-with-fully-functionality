<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('school_id')->unsigned()->index();
            $table->string('class_name');
            $table->timestamps();

            $table->foreign('school_id')
            ->references('id')
            ->on('school')
            ->OnUpdate('CASCADE')
            ->OnDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
}
