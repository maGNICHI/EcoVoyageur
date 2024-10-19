<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('reclamations', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable(); // Add the user_id column
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key constraint
    });
}

public function down()
{
    Schema::table('reclamations', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

};