<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Livro;
use App\Models\Autor;
use App\Models\Capitulos;


class LivroController extends Controller
{
    public function index(Request $request)
    {   
        //$LivroModel = json_decode(DB::table('livro')->select('nome')->get(), true);
        $livros = Livro::query()
            -> orderBy('nm_livro')    
            -> get();

        $mensagem = $request -> session()->get('mensagem');
        $mensagemRegistroApagado = $request -> session()->get('mensagemRegistroApagado');
        

        return  view('livros.index', 
        compact('livros', 'mensagem','mensagemRegistroApagado'));
        
    }
    public function create() 
    {  
        $autores = Autor::query()
                 -> orderBy('id')
                 -> get();
        

        return view('livros.create', compact('autores'));
    }

    public function destroy(Request $request)
    {
        var_dump($request->id);
        Livro::destroy($request->id);

        /*$request->session()
            ->flash('mensagemRegistroApagado', 
                "Livro foi removido com sucesso."
            );
*/  
        return redirect('/livros');
    }
     
    public function store(Request $request) 
    {
        

        $autor = $request->input('autor');

        $idAutor = Autor::where('nm_autor', $autor)->pluck('id')->toArray();

        
        //var_dump($autor);
        //var_dump($idAutor[0]);
        /*
        $this->validate($request, [
            'nm_livro'              => 'required',
            'id'              => 'required',
            'capitulos'             => 'required',
        ]);
            */
        $livro =  new Livro([
            'nm_livro'                => $request->input('nm_livro'),
            'autor_id'                => $idAutor[0],
        ]);
    
        $livro->save();
            
        $qtd_capitulos = $request->input('capitulos');
        
        
        for ($i = 1; $i <= $qtd_capitulos; $i++) {

            $capitulo = new Capitulos([
                'capitulo'      => $i,
                'livro_id'      =>$livro->id,
           ]);
           $capitulo->save();
        }
    

        $request->session()
            ->flash('mensagem', 
                "Livro {$livro->id} - {$livro->nome} foi criado com sucesso."
            );
        
        return redirect('/livros');
    }
}
