<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m__classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->default('null');
            $table->string('class_numeric')->default('null');
            $table->text('note')->default('null');
            $table->string('level')->default('null');
            $table->tinyInteger('status')->default('1');
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
        Schema::dropIfExists('m__classes');
    }
}
