<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'number',
        'country',
        'born_at',
        'team_id',
    ];

    protected $casts = [
        'born_at' => 'datetime'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
