<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = [
        "devis_id",
        "entreprise_id",
        "prestation_id",
        "color",
        "textColor",
        "allDay",
        "status",
        "start",
        "end",
        "title",
        'num_missions'
    ];
    protected $guard = [];

    /**
     * Get the entreprise that owns the Mission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class, 'prestation_id');
    }

    public function getStatusAttribute($attribue)
    {
        return [
            0 => '<span class="badge bg-warning text-dark">En cours',
            1 => '<span class="badge bg-success">Achevé</span>'
        ][$attribue];
        /*         if(){
            '';

        }else{
                '<span class="badge bg-warning text-dark">En cours';
        } */
    }
}