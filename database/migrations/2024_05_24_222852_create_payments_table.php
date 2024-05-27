<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->foreignId('date_showtime_id')->constrained('date_showtime')->onDelete('cascade');
            $table->bigInteger('total_price')->default(0);
            $table->string('status')->default('paid');
            $table->string('transaction_id')->nullable();
            $table->timestamps();  // Ensures created_at and updated_at are automatically handled
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
