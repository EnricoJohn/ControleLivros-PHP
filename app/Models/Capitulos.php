<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capitulos extends Model
{   
    protected $table = 'capitulos';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['capitulo', 'livro_id'];

    public function livro() 
    {
        return $this->belongsTo(Livro::Class);
    }
}
