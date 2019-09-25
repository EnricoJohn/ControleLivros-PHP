<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'livros';
    //public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = ['nm_livro',
                           'autor_id',
                          ];


    public function autor() 
    {
        return $this->belongsTo(Autor::Class);
    }

    public function capitulos()
    {
        return $this->hasMany(Capitulos::Class);
    }
}
