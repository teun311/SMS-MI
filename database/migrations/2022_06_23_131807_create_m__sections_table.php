<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m__sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_name')->default(value('null'));
            $table->integer('capacity')->default(value('15'))->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('m__sections');
    }
}
