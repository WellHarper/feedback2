<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quesito;

class QuesitoController extends Controller
{


    /*
    * @var Quesito
    */
    private $quesito;

    public function __construct(Quesito $quesito)
    {
        $this->quesito = $quesito;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $quesitos = $this->quesito::orderBy('id','DESC')->get();
        return view('quesito.quesito_index', compact('quesitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return view('quesito.quesito_create');
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
        
            $quesito = $this->quesito;
            $quesito->nome = $request->nome;
            $quesito->descricao = $request->descricao;
            $quesito->save();
            return redirect()->route('quesito.index')->with('message', 'Registro criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $quesito = $this->quesito::find($id);
        return view('quesito.quesito_show',compact('quesito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $quesito = $this->quesito::find($id);
        return view('quesito.quesito_edit',compact('quesito'));
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

            $quesito = $this->quesito::findOrFail($id);
            $quesito->nome = $request->nome;
            $quesito->descricao = $request->descricao;
            $quesito->save();
            return redirect()->route('quesito.index')->with('message', 'Registro atualizado com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
            $quesito = $this->quesito::findOrFail($id);
            $quesito->delete();
            return redirect()->route('quesito.index')->with('message','Registro excluído com sucesso!');

    }

}