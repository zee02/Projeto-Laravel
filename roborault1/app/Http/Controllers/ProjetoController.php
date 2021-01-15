<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Listagem de projetos
        $projetos = Projeto::all(); //select * from projetos;
        return view('projetos.index', compact('projetos'));
        //o método compact serve para passar o resultado do select para a view index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all(); //select * from categorias;
        return view('projetos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validação do Formulário Projeto
        request()->validate([
            'inputDesig' => 'required',
            'selectCat' => 'required',
            'inputResp' => 'required',
            'inputData' => 'required',
            'inputGit' => 'required',
            'textDesc' => 'required'

        ]);
        //Inserção de dados no Forumulário Projeto
        $projeto = new Projeto();
        $projeto->designacao = request('inputDesig');
        $projeto->categoria_id = request('selectCat');
        $projeto->responsavel = request('inputResp');
        $projeto->dataInicio = request('inputData');
        $projeto->github = request('inputGit');
        $projeto->descricao= request('textDesc');


        $projeto-> save();


        $request->validate([
           // 'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:3096'
          ]);

          if($request->hasfile('imageFile')) {

              $i = 1;
              foreach($request->file('imageFile') as $file)
              {
                  $name = $file->getClientOriginalName();
                  $extension = pathinfo($name, PATHINFO_EXTENSION);
                  $designacao = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$projeto->designacao);
                  $designacao = str_replace(' ', '', $designacao);
                  $name = $designacao . $i . "." . $extension;
                  $file->storeAs('public/uploads/', $name);
                  $imgData[] = $name;
                  $i++;
              }

              $fileModal = new Foto();
              $fileModal->designacao = json_encode($imgData);
              $fileModal->projeto_id = $projeto->id;
              $fileModal->save();


          }
         return redirect('/projetos')-> with('message','Projeto inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        $foto = Foto::where('projeto_id', $projeto->id) -> first();
        $fotos = json_decode($foto->designacao);
        return view('projetos.show', compact('projeto', 'fotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        //
        $categorias = Categoria::all(); //select * from categorias;
        $foto = Foto::where('projeto_id', $projeto->id) -> first();
        if($foto) {

            $designacoes = json_decode($foto->designacao);
        }else {
            $designacoes = [];
        }
        return view('projetos.edit', compact('projeto', 'projeto', 'foto', 'designacoes', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projeto $projeto)
    {
        //
        //Validação do Formulário Projeto

        request()->validate([
            'inputDesig' => 'required',
            'selectCat' => 'required',
            'inputResp' => 'required',
            'inputData' => 'required',
            'inputGit' => 'required',
            'textDesc' => 'required'

        ]);
        //Inserção de dados no Forumulário Projeto
        $projeto = new Projeto();
        $projeto->designacao = request('inputDesig');
        $projeto->categoria_id = request('selectCat');
        $projeto->responsavel = request('inputResp');
        $projeto->dataInicio = request('inputData');
        $projeto->github = request('inputGit');
        $projeto->descricao= request('textDesc');

        $projeto->save();

        $request->validate([
            // 'imageFile' => 'required',
             'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:3096'
           ]);

           if($request->hasfile('imageFile')) {

               $fileModal=Foto::where('projeto_id', $projeto->id)->first();
               $fotos = ($fileModal) ? json_decode($fileModal->designacao) : [];
               $i = count($fotos) + 1;
               foreach($request->file('imageFile') as $file)
               {
                   $name = $file->getClientOriginalName();
                   $extension = pathinfo($name, PATHINFO_EXTENSION);
                   $designacao = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$projeto->designacao);
                   $designacao = str_replace(' ', '', $designacao);
                   $name = $designacao . $i . "." . $extension;
                   $file->storeAs('public/uploads/', $name);
                   $imgData[] = $name;
                   $i++;
               }

               $imgData = array_merge($fotos, $imgData);
               $fileModal->designacao = json_encode($imgData);
               $fileModal->save();


           }
        return redirect('/projetos')-> with('message','Projeto inserido com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projeto $projeto)
    {
        //
        $projeto->delete();
        return redirect('/projetos')->with('message', 'Projeto removido com sucesso!');
    }
}
