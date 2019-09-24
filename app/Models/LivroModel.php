<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivroModel extends Model
{
    protected $table = 'livro';
    protected $primaryKey = 'id_livro';
    protected $fillable = ['nome_livro', 
                           'autor',
                           'capitulos',
                          ];


    public function autor() {
        return $this->belongsTo(Autor::Class);
    }
}
