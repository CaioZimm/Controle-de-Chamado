<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Organizacoes;
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

        return view('modal-criar-organizacao', compact('organizacoes'));
    }

    public function store(Request $request){
        // $request->validate([
        //     'name'     => 'required|string',
        //     'segmento' => 'nullable|integer',
        // ]);

        if(DB::table("organizacao") 
            ->where('nome', $request->nome)->exists()){
                return redirect()->back()->withErrors(['nome'=>'já existe no registro']); //tem que chamar na view
        }

        Organizacoes::create([
            'nome'     => $request->nome,
            'segmento' => $request->segmento, 
        ]);


        //Para editar o campo
       //$registro = Organizacoes::find(1);
       // if ($registro){
       //     $registro->nome = $novoNome;
       //     $registro->segmento = $novoSeguimento;
//
       //     $registro->save();
       // } 

        return redirect()->back();
    }

}