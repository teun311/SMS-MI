<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('null');
            $table->string('site_name')->default('null');
            $table->string('site_logo')->default('null');
            $table->string('site_icon')->default('null');
            $table->text('site_banner')->default('null');
            $table->text('site_address')->default('null');
            $table->string('site_dist')->default('null');
            $table->string('site_division')->default('null');
            $table->string('site_country')->default('null');
            $table->text('site_meta')->default('null');
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
        Schema::dropIfExists('settings');
    }
}
