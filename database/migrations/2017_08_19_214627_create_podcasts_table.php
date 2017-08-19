<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pod_casts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id');
            $table->string('title');
            $table->string('guid');
            $table->string('link');
            $table->string('pub_date');
            $table->string('author');
            $table->string('description');
            $table->string('audio');
            $table->string('type');
            $table->string('duration');
            $table->string('length');
            $table->text('content');

            $table->unique('guid');
            $table->index(['guid', 'pub_date']);
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pod_casts');
    }
}
