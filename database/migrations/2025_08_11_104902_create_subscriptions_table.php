<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
    $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->enum('type', ['monthly', 'yearly']);
        $table->date('start_date');
        $table->date('end_date');
        $table->enum('status', ['active', 'cancelled', 'expired'])->default('active');
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
        Schema::dropIfExists('subscriptions');
    }
}
