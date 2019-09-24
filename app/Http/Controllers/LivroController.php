<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\LivroModel;
use App\Models\Autor;

//@foreach($autores as $autor)
//{{ $autor->nm_autor }}
//@endforeach


class LivroController extends Controller
{
    public function index(Request $request)
    {   
        //$LivroModel = json_decode(DB::table('livro')->select('nome')->get(), true);
        $livros = LivroModel::query()
            -> orderBy('nome_livro')    
            -> get();

        $mensagem = $request -> session()->get('mensagem');
        $mensagemRegistroApagado = $request -> session()->get('mensagemRegistroApagado');
        

        return  view('livros.index', 
        compact('livros', 'mensagem','mensagemRegistroApagado'));
        
    }
    public function create() 
    {  
        $autores = Autor::query()
        -> orderBy('nm_autor')
        -> get();
        

        return view('livros.create', compact('autores'));
    }

    public function destroy(Request $request)
    {
        LivroModel::destroy($request->id);

        $request->session()
            ->flash('mensagemRegistroApagado', 
                "Livro foi removido com sucesso."
            );

        return redirect('/livros');
    }
     
    public function store(Request $request) 
    {
        //$livro = LivroModel::create($request->all());
        $nm_autor = $request->input('autor');
        var_dump($nm_autor);
        $autor = Autor::find($nm_autor);
        var_dump($autor);
        /*$this->validate($request, [
            'nome_livro'     => 'required',
            'autor'          => 'required',
            'capitulos'      => 'required',
        ]);
            */
        $livro =  new LivroModel([
            'nome_livro'          => $request->input('nome'),
            'autor'               => $nm_autor,
            'capitulos'           => $request->input('capitulos'),
        ]);
        
        //var_dump($livro->nome_livro);
        //var_dump($livro->autor);
        //var_dump($livro->capitulos);

        //$livro->save();

        $request->session()
            ->flash('mensagem', 
                "Livro {$livro->id} - {$livro->nome} foi criado com sucesso."
            );
        
        //return redirect('/livros');
    }
}
