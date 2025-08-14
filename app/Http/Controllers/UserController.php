<?php

namespace App\Http\Controllers;

use \Validator;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'sexo' => 'required',
            'matricula' => 'required',
            'profissao' => 'required',
            'endereco' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->cpf,
            'date' => $request->date,
            'sexo' => $request->sexo,
            'matricula' => $request->matricula,
            'profissao' => $request->profissao,
            'statu' => 2,
            'role' => 2,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'password' => Hash::make($request->password),


        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     */
    public function reset(Request $request)
    {
        dd($request->all());
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
        $data = User::where('id', '=', $id)->first();
        $data->statu = $request->startu;
        $data->update();
        return redirect()->back()->with('msg', 'Alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('msg', 'Alterado com sucesso!');

    }
}
