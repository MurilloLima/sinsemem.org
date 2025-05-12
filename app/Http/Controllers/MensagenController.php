<?php

namespace App\Http\Controllers;

use App\Models\Mensagen;
use Illuminate\Http\Request;

class MensagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mensagen::where('user_id', '=', auth()->user()->id)->get();
        return view('admin.pages.mensagem.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('admin.pages.mensagem.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'assunto' => 'required',
            'mensagem' => 'required',
        ]);
        // dd($request->all());
        Mensagen::create([
            'user_id' => $request->id,
            'title' => $request->assunto,
            'content' => $request->mensagem,
        ]);
        return redirect()->back()->with('msg', 'Mensagem enviada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mensagen $mensagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensagen $mensagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensagen $mensagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensagen $mensagen)
    {
        //
    }
}
