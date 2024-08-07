<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    //protected $gardeu=[];
    protected $fillable = ['date', 'note', 'etudiant_id', 'matiere_id'];
    public function etudiants(){
        return $this->belongsTo(Etudiant::class);
    }
    public function matieres(){
        return $this->belongsTo(Matiere::class);
    }
}
