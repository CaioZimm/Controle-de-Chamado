<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Organizacoes;
use App\Models\Clientes;
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


         if(DB::table("organizacao")
             ->where('nome', $request->nome)->exists()){
                 return redirect()->back()->withErrors(['nome'=>'já existe no registro']); //tem que chamar na view
         }

        $organizacao = Organizacoes::create([
            'nome'     => $request->nome,
            'segmento' => $request->segmento, 
        ])->id;
        


        if ($request->cliente_direto == 1)
            Clientes::create([
                'nome'           => $request->nome,
                'segmento'       => $request->segmento,
                'id_organizacao' => $id_organizacao,
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

    public function buscarOrganizacoes(Request $request)
    {
        $search = $request->get('q');

        $organizacoes = DB::table('organizacao') 
                        ->where('nome', 'LIKE', "%{$search}%")
                        ->select('id', 'nome as text')
                        ->get();

        return response()->json($organizacoes);
    }

}
