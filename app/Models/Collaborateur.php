<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Collaborateur extends Model
{
    protected $table = 'collaborateurs';

    protected $fillable = [
        'nom_collaborateur',
        'prenom_collaborateur',
        'login_collaborateur',
        'mdp_collaborateur',
        'adresse_collaborateur',
        'cp_collaborateur',
        'ville_collaborateur',
        'dateEmbauche_collaborateur',
        'domaine_collaborateur',
        'user_id', // Foreign key
    ];

    // Relation avec User (un collaborateur appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
