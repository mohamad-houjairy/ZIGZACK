<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFestivalVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_videos', function (Blueprint $table) {
              $table->id();
        $table->foreignId('video_id')->constrained('videos')->onDelete('cascade');
        $table->date('starting_date');
        $table->date('ending_date');
        $table->string('location');
        $table->decimal('latitude', 10, 7)->nullable();
        $table->decimal('longitude', 10, 7)->nullable();
        $table->string('organizer_name');
        $table->string('organizer_phone', 20);
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
        Schema::dropIfExists('festival_videos');
    }
}
