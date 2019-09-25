<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autor';
    protected $primaryKey = 'id';
    protected $fillable = ['nm_autor'];

    public function livros() {
        return $this->hasMany(Livro::Class);
    }
}
