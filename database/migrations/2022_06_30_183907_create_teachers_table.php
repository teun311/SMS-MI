<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('designation');
            $table->date('dob');
            $table->string('gender');
            $table->string('religion');
            $table->date('join_date');
            $table->string('img');
            $table->longText('address');
            $table->string('subject');
            $table->string('high_edu');
            ///edu cert
            $table->string('created_by')->default(null);
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('slug');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('teachers');
    }
}
