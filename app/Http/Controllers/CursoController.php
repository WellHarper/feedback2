<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Curso;

class CursoController extends Controller
{


    /*
    * @var Curso
    */
    private $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $cursos = $this->curso::orderBy('id','DESC')->get();
        return view('curso.curso_index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('curso.curso_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O campo nome é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ], $messages);
        
            $curso = $this->curso;
            $curso->nome = $request->nome;
            $curso->descricao = $request->descricao;
            $curso->save();
            return redirect()->route('curso.index')->with('message', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $curso = $this->curso::find($id);
        return view('curso.curso_show',compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $curso = $this->curso::find($id);
        return view('curso.curso_edit',compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $messages = [
            'nome.required' => 'O campo nome é obrigatório!',
            'descricao.required' => 'O campo descrição é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ], $messages);

            $curso = $this->curso::findOrFail($id);
            $curso->nome = $request->nome;
            $curso->descricao = $request->descricao;
            $curso->save();
            return redirect()->route('curso.index')->with('message', 'Registro atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
            $curso = $this->curso::findOrFail($id);
            $curso->delete();
            return redirect()->route('curso.index')->with('message','Registro excluído com sucesso!');

    }

}