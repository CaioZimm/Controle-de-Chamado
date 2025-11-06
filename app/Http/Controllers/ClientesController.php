<?php

namespace App\Http\Controllers;

use DB;
use User;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller{

    public function index(Request $request) {

        $rpt = DB::table("cliente")
                ->where(function($sql) use ($request) {
                    if ($request->nome) {
                        $sql->where("nome", $request->nome);
                    }
                })
                ->orderBy('nome', 'desc')
                ->get();

        return view('modal-criar-clientes', compact('clientes'));
    }

    public function store(Request $request){

        if(DB::table("cliente")
            ->where('nome', $request->nome)->exists()){
                return redirect()->back()->withErrors(['nome'=>'já existe no registro']); //tem que chamar na view
        }

        if(DB::table("cliente")
            ->where('cnpj', $request->cnpj)->exists()){
                return redirect()->back()->withErrors(['cnpj'=>'já existe no registro']);
        }

        Clientes::create([
            'nome'           => $request->nome,
            'cnpj'           => $request->cnpj,
            'segmento'       => $request->segmento,
            'id_organizacao' => $request->id_organizacao,
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

    public function buscarClientes(Request $request)
    {
        $search = $request->get('q');

        $clientes = DB::table('cliente')
                    ->where('nome', 'LIKE', "%{$search}%")
                    ->orWhere('cnpj', 'LIKE', "%{$search}%")
                    ->select('id', 'nome as text')
                    ->get();

        return response()->json($clientes);
    }

}
