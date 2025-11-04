<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Organizacao;
use Illuminate\Http\Request;

class OrganizacoesController extends Controller{
  
    public function index(Request $request) {

        $rpt = DB::table("organizacao")
                ->where(function($sql) use ($request) {
                    if ($request->nome) {
                        $sql->where("nome", $request->nome);
                    } 
                })
                ->orderBy('nome', 'desc')
                ->get();

        return view('modal-criar-organizacao', compact('organizacao'));
    }

    public function store(Request $request){
        $request->validate([
            'name'     => 'required|string',
            'segmento' => 'nullable|integer',
        ]);

        organizacao::create([
            'nome'     => $request->name,
            'segmento' => $request->segmento, 
        ]);


        //Para editar o campo
        $registro = organizacao::find(1);
        if ($registro){
            $registro->nome = $novoNome;
            $registro->segmento = $novoSeguimento;

            $registro->save();
        }

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
