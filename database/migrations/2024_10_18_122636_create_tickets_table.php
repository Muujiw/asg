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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lié à l'utilisateur qui crée le ticket
        $table->string('subject'); // Sujet du ticket
        $table->text('message'); // Contenu du message
        $table->boolean('is_resolved')->default(false); // Statut du ticket
        $table->timestamps(); // Dates de création et de mise à jour
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
