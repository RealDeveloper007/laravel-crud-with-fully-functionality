<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('class_id')->unsigned()->index();
            $table->string('subject_name');
            $table->timestamps();

            $table->foreign('class_id')
            ->references('id')
            ->on('class')
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
        Schema::dropIfExists('subject');
    }
}
