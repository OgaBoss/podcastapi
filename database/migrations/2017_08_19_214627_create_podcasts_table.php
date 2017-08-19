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
            $table->integer('site_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('guid')->nullable();
            $table->string('link')->nullable();
            $table->string('pub_date')->nullable();
            $table->string('author')->nullable();
            $table->string('description')->nullable();
            $table->string('audio')->nullable();
            $table->string('type')->nullable();
            $table->string('duration')->nullable();
            $table->string('length')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();

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
