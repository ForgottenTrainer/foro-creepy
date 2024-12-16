<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apelacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'apelamiento',
        'status',
        'limit'
    ];
}
