<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index() {
        
        $autores = Autor::query()
            -> orderby('nm_autor')
            -> get();
        

        return view('autores.index', compact('autores'));
    }

    public function destroy(Request $request)
    {
        $autor = Autor::find($request->id);

        $autor->delete();

        return redirect('/autor');
    }

    public function store(Request $request) {
        
        $autor = new Autor([
            'id_autor'     => rand(10000,100000),
            'nm_autor'     => $request->input('autor'),
        ]);
                
        $autor->save();
    
        return redirect("/autor");
    }
}
