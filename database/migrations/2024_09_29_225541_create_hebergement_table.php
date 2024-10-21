<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHebergementTable extends Migration
{
    public function up()
    {
        Schema::create('hebergement', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID column
            $table->string('nom'); // Name of the accommodation
            $table->text('description'); // Description of the accommodation
            $table->integer('duree'); // Duration
            $table->decimal('prix', 10, 2); // Price
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('hebergement'); // Drop the table if it exists
    }
}
