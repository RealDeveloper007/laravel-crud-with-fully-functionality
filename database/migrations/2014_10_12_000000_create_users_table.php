<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('school_id')->unsigned()->index();
            $table->integer('class_id')->unsigned()->index();
            $table->integer('subject_id')->unsigned()->index();
            $table->string('short_image',150);
            $table->text('full_image');
            $table->integer('gender')->comment('1 - Male, 2 - Female');
            $table->json('interests');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('school_id')
            ->references('id')
            ->on('school')
            ->OnUpdate('CASCADE')
            ->OnDelete('CASCADE');

            $table->foreign('class_id')
            ->references('id')
            ->on('class')
            ->OnUpdate('CASCADE')
            ->OnDelete('CASCADE');

            $table->foreign('subject_id')
            ->references('id')
            ->on('subject')
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
        Schema::dropIfExists('users');
    }
}
