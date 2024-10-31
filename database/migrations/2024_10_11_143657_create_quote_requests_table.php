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
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Lié à l'utilisateur
            $table->string('contract_type'); // Type de contrat demandé
            $table->date('start_date'); // Date de début souhaitée
            $table->text('details')->nullable(); // Détails supplémentaires
            $table->boolean('is_processed')->default(false); // État de traitement
            $table->timestamps(); // Dates de création et de mise à jour
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
