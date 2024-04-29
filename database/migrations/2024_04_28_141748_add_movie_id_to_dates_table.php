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
        Schema::table('dates', function (Blueprint $table) {
            $table->foreignId('movie_id')->after('date')->constrained('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('dates', function (Blueprint $table) {
        $table->dropForeign(['movie_id']);
        $table->dropColumn('movie_id');
    });
}
};
