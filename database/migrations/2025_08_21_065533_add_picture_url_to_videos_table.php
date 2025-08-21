<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPictureUrlToVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
             $table->string('picture')->nullable();            // path to video thumbnail
            $table->year('production_year')->nullable();      // year of production
            $table->decimal('rating', 3, 1)->default(0);      // rating e.g. 4.5
            $table->unsignedBigInteger('views_count')->default(0); // number of views
         $table->string('duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            //
        });
    }
}
