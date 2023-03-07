<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 1000);
            $table->string('share_title', 1000);
            $table->string('description', 1000);
            $table->string('keyword', 1000);
            $table->string('page_img', 1000);
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
        Schema::dropIfExists('home_seo');
    }
};
