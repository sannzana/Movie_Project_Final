<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title')
                ->unique();
            $table->string('genre');
            $table->text('description');
            $table->date('release_date');
            $table->string('poster_url');
            $table->string('starring');
            $table->string('director');
            $table->string('producer');
            $table->string('type');
            $table->string('duration');
            $table->string('age_rating');
            $table->bigInteger('ticket_price');
            $table->datetimes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
