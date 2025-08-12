<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_video', function (Blueprint $table) {
         $table->foreignId('actor_id')->constrained('actors')->onDelete('cascade');
        $table->foreignId('video_id')->constrained('videos')->onDelete('cascade');
        $table->primary(['actor_id', 'video_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_video');
    }
}
