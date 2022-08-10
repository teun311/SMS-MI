<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id');
            $table->bigInteger('group_id');
            $table->string('subject_name');
            $table->string('subject_type');
            $table->tinyInteger('is_main_subject')->default('0');
            $table->integer('pass_mark')->nullable()->default(10);
            $table->integer('final_mark')->nullable()->default(100);
            $table->string('level')->nullable();
            $table->string('subject_code')->nullable();
            $table->string('subject_author')->nullable();
            $table->string('sub_book_img')->nullable();
            $table->tinyInteger('is_for_graduation')->default('0');
            $table->tinyInteger('is_optional')->default('0');
            $table->text('note')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
