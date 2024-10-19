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
        Schema::create('certificats', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nom'); // Name of the certificate
            $table->text('description')->nullable(); // Description of the certificate
            $table->string('organisme_emetteur'); // Issuing organization
            $table->date('date_attribution'); // Date of attribution
            $table->date('date_expiration')->nullable(); // Expiration date (nullable)
            $table->foreignId('partenaire_id')->constrained('partenaires')->onDelete('cascade');
             $table->timestamps(); // Timestamps (created_at and updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificat');
    }
};
