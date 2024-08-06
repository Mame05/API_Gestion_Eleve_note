<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $gardeu = [];
    public function u_e_s(){
        return $this->belongsTo(UE::class);
    }
    public function evaluations(){
        return $this->hasmany(Evaluation::class);
    }
}
