<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Tarrpt;
use Illuminate\Http\Request;

class RptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        // ✅ Definir diretamente no método
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
                        $sql->where("cliente", $request->cliente);
                    } else {
                        $sql->whereNull("cliente");
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

        return view('tarrpt', [
            'rpt' => $rpt,
            'segmentos' => $segmentos
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'versao'   => 'required|numeric',
            'tela'     => 'nullable|string',
            'segmento' => 'nullable|integer', // ✅ Agora é integer
            'file'     => 'required|file',
            'cliente'  => 'nullable|string',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        $dataAtual = now()->format('Y-m-d');
        $horaAtual = now()->format('H:i:s');

        Tarrpt::create([
            'nome'     => $file->getClientOriginalName(),
            'versao'   => $request->versao,
            'segmento' => $request->segmento, // ✅ Salva o número no banco
            'tela'     => $request->tela,
            'data'     => $dataAtual,
            'hora'     => $horaAtual,
            'endereco' => $path,
            'cliente'  => $request->cliente,
        ]);

        return redirect()->back()->with('success', 'Nova linha adicionada na tabela RPT!');
    }

    // ... outros métodos


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
