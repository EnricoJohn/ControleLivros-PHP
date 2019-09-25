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

    public function destroya(Request $request)
    {
        Autor::destroy($request->id);

        return redirect('/autor');
    }

    public function store(Request $request) {
        /*
        $this->validate($request, [
            'nm_autor'    => 'required',
        ]);*/

        $autor = new Autor([
            'nm_autor'     => $request->input('autor'),
        ]);
                
        $autor->save();
    
        return redirect("/autor");
    }
}
