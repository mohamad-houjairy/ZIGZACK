<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
  $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('video_id')->nullable()->constrained('videos')->onDelete('cascade');
        $table->foreignId('subscription_id')->nullable()->constrained('subscriptions')->onDelete('cascade');
        $table->decimal('amount', 8, 2);
        $table->enum('payment_method', ['credit_card', 'paypal', 'stripe']);
        $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
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
        Schema::dropIfExists('payments');
    }
}
