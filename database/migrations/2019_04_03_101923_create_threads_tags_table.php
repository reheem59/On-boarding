<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads_tags', function (Blueprint $table) {
            $table->integer('thread_id')->unsigned();
            $table->foreign('thread_id')->references('thread_id')->on('threads');
            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('tag_id')->on('tags');
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
        Schema::dropIfExists('threads_tags');
    }
}
