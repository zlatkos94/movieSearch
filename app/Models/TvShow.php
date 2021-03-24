<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvShow extends Model
{
    use HasFactory;

    protected $table='tvshow';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'overview',
        'vote_average',
        'poster_path'
    ];
}
