<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborateursTable extends Migration
{
    public function up()
    {
        Schema::create('collaborateurs', function (Blueprint $table) {
            $table->id('id_collaborateur'); // Auto-incrementing ID
            $table->unsignedBigInteger('user_id'); // Clé étrangère vers users
            $table->string('nom_collaborateur', 30)->nullable();
            $table->string('prenom_collaborateur', 30)->nullable();
            $table->string('adresse_collaborateur', 30)->nullable();
            $table->char('cp_collaborateur', 5)->nullable();
            $table->string('ville_collaborateur', 30)->nullable();
            $table->date('dateEmbauche_collaborateur')->nullable();
            $table->tinyInteger('domaine_collaborateur')->nullable();
            $table->timestamps(); // Ajout automatique des colonnes created_at et updated_at
            
            // Clé étrangère avec table users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collaborateurs');
    }
}
