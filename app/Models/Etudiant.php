<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{
    use HasFactory,SoftDeletes;
    //protected $gardeu=[];
     // Définir les attributs assignables en masse
     protected $fillable = [
        'prenom',
        'nom',
        'adresse',
        'telephone',
        'matricule',
        'date_naissance',
        'email',
        'mot_de_passe',
        'photo'
    ];
    public function evaluations(){
        return $this->hasmany(Evaluation::class);
    }
}
