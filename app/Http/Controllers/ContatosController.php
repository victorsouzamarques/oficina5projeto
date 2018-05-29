<?php

namespace App\Http\Controllers;

use App\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contatos = Contatos::orderBy('nome');

        if($request->nome != null)
        {
            if($request->has('nome')){
                $contatos->where("nome", "like", "%{$request->nome}%");
            }
        }

        if($request->phone != null)
        {
            if($request->has('telefone')){
                $contatos->where("telefone", "like", "%{$request->telefone}%");
            }
        }

        $contatos = $contatos->paginate(20);

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nome' => 'required',
                'email' => 'required',
                'telefone' => 'required|max:11',
                'nascimento' => 'required',
        ]);
        $contato =  Contatos::create(['usuario' => $request->usuario,'image' => time().'.'.$request->image->getClientOriginalExtension(), 'nome' => $request->nome, 'email' => $request->email, 'telefone' => $request->telefone,'nascimento' => $request->nascimento]);

        $request->image->move(public_path('images'), $contato['image']);

        return redirect('/contatos/'.$contato->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function show(Contatos $contato)
    {
        return view('contatos.show',compact('contato',$contato));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function edit(Contatos $contato)
    {
        return view('contatos.edit',compact('contato',$contato));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contatos $contato)
    {
        //Validate
        $request->validate([
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nome' => 'required',
            'email' => 'required',
            'telefone' => 'required|max:11',
            'nascimento' => 'required',
        ]);
        
        
        // $contato->image = time().'.'.$request->image->getClientOriginalExtension();
        
        // $request->image->move(public_path('images'), $contato['image']);
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->nascimento = $request->nascimento;
        $contato->save();
        $request->session()->flash('message', 'Alterado com Sucesso!');
        return redirect('contatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contatos $contato)
    {
        $contato->delete();
        // $request->session()->flash('message', 'contato deletado!');
        return redirect('contatos');
    }
}
