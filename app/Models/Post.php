<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'titulo',
        'subtitulo',
        'descripcion',
        'image',
        'categoria'
    ];
    // app/Models/Post.php

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    use HasFactory;
}
