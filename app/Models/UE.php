<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    use HasFactory;
    protected $guardeu=[];
    
    public function matieres(){
        return $this->hasMany(Matiere::class);
    }
}
