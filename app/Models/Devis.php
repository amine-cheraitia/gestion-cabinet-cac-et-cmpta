<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $fillable = ["id", "num_devis", "date_devis", "exercice_id", "entreprise_id", "prestation_id", "total"];
}