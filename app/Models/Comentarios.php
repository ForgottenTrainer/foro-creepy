<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $fillable = [
        'comentario',
        'id_user1',
        'id_user2',
        'id_post'
    ];
    use HasFactory;
}
