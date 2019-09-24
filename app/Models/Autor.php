<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autor';
    protected $primaryKey = 'id_autor';
    protected $fillable = ['id_autor', 'nm_autor'];

    public function livro() {
        return $this->hasMany(Livro::Class);
    }
}
