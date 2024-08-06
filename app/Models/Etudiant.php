<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{
    use HasFactory,SoftDeletes;
    protected $gardeu=[];
    public function evaluations(){
        return $this->hasmany(Evaluation::class);
    }
}
