<?php

namespace App\Http\Controllers;

use App\Models\Tarrpt;
use Illuminate\Http\Request;

class RptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $rpt = Tarrpt::paginate(10); // ✅ método links $rpt
        return view('tarrpt', compact('rpt'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request){
        $request->validate([
            'versao'   => 'required|numeric',
            'tela'     => 'required|string',
            'segmento' => 'required|string',
            'data'     => 'nullable|date',
            'hora'     => 'nullable|string',
            'endereco' => 'nullable|string',
            //'cliente'  => 'nullable|string',
        ]);

        //dd($request->all());//para teste do array que retorna

        //atencao, esse tarrpt so era para estar com T maisculo, mas so pega assim
        tarrpt::create([
            'versao'   => $request->versao,
            'segmento' => $request->segmento,
            'tela'     => $request->tela,
            'data'     => $request->data,
            'hora'     => $request->hora,
            'endereco' => $request->endereco,
            //'cliente'  => $request->cliente,
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
