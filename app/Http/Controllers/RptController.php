<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Tarrpt;
use Illuminate\Http\Request;

class RptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $segmentos = [
            1 => 'Varejo',
            2 => 'Atacado',
            3 => 'E-commerce',
            4 => 'Serviços',
            5 => 'Indústria',
            6 => 'Agronegócio',
            7 => 'Saúde',
            8 => 'Educação',
            9 => 'Financeiro',
            10 => 'Outros'
        ];

        $rpt = DB::table("rpt")
                ->whereNotNull("endereco")
                ->where(function($sql) use ($request) {
                    if ($request->cliente) {
                        $sql->where("id_cliente", $request->id_cliente);
                    } else {
                        $sql->whereNull("id_cliente");
                    }
                    if ($request->versao) {
                        $sql->where("versao", $request->versao);
                    }
                    if ($request->segmento){
                        $sql->where("segmento", $request->segmento);
                    }
                    if ($request->tela) {
                        $sql->where("tela", $request->tela);
                    }
                })
                ->orderBy('versao', 'desc')
                ->orderBy('data', 'desc')
                ->orderBy('hora', 'desc')
                ->paginate(10)->withQueryString();

        $time = Auth::user()->time;
        return view('tarrpt', compact('segmentos', 'rpt', 'time'));
    }

    public function store(Request $request){
        $request->validate([
            'versao'   => 'required|numeric',
            'tela'     => 'nullable|string',
            'segmento' => 'nullable|integer',
            'file'     => 'required|file',
            'id_cliente'  => 'nullable|string',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public'); 

        $dataAtual = now()->format('Y-m-d');
        $horaAtual = now()->format('H:i:s');

        Tarrpt::create([
            'nome'     => $file->getClientOriginalName(),
            'versao'   => $request->versao,
            'segmento' => $request->segmento, // Salva o número no banco
            'tela'     => $request->tela,
            'data'     => $dataAtual,
            'hora'     => $horaAtual,
            'endereco' => $path,
            'cliente'  => $request->id_cliente,
        ]);

        return redirect()->back()->with('success', 'Nova linha adicionada na tabela RPT!');
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
