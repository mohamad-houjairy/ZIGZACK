<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('creator_id')->nullable()->constrained('content_creators')->onDelete('cascade');
        $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
        $table->string('title', 150);
        $table->text('description')->nullable();
        $table->string('video_url');
        $table->decimal('price', 8, 2)->default(0);
        $table->enum('distribution', ['festival_only', 'public', 'library'])->default('public');
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
        Schema::dropIfExists('videos');
    }
}
