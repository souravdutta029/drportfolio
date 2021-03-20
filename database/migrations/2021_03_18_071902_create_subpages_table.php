<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpages', function (Blueprint $table) {
            $table ->id();
            $table ->string('title');
            $table -> unsignedBigInteger('page_id');
            $table ->string('slug');
            $table ->longText('body');
            $table ->string('meta_keyword');
            $table ->string('meta_tag');
            $table ->text('meta_description');
            $table ->string('og_image');
            $table ->integer('status');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subpages');
    }
}
