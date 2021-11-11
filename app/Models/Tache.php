<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        "designation",
        "title",
        "start",
        "end",
        "allDay",
        "color",
        "textColor",
        "status",
        "mission_id",
        "user_id",
        'num_tache',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mission()
    {
        return $this->belongsTo(Mission::class, 'mission_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'tache_id');
    }
}