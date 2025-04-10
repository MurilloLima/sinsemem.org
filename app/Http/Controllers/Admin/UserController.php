<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function export(Request $request)
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'date' => 'required',
            'sexo' => 'required',
            'matricula' => 'required',
            'profissao' => 'required',
            'endereco' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'date' => $request->date,
            'sexo' => $request->sexo,
            'matricula' => $request->matricula,
            'profissao' => $request->profissao,
            'endereco' => $request->endereco,
            'email' => $request->email,
            'password' => $request->password,

        ]);
        return redirect()->back()->with('msg', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function carteira()
    {
        return view('admin.pages.carteira.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function servidores()
    {
        return view('admin.pages.servidores.create');
    }

    public function servistore(Request $request)
    {
        // dd(User::find(auth()->user()->id));
        $request->validate(
            [
                'name' => 'required',
                'matricula' => 'required',
                'cidade' => 'required',
                'uf' => 'required',
                'nacionalidade' => 'required',
                'natural' => 'required',
                'rg' => 'required',
                'email' => ['required', 'unique:' . User::class],
                'cargo' => 'required',
                'nivel' => 'required',
                'lotacao' => 'required',
            ]
        );
        User::create([
            'name' => $request->name,
            'matricula' => $request->matricula,
            'estado_civil' => $request->estado_civil,
            'endereco' => $request->endereco,
            'cep' => $request->cep,
            'cidade' => $request->cidade,
            'uf' => $request->uf,
            'natural' => $request->natural,
            'rg' => $request->rg,
            'email' => $request->email,
            'cargo' => $request->cargo,
            'nivel' => $request->nivel,
            'lotacao' => $request->lotacao,
            'pai' => $request->pai,
            'mae' => $request->mae,
            'password' => Hash::make('12345678'),
        ]);

        return redirect()->back()->with('msg', 'Cadastro realizado com sucesso, senha padrão para o usuário é 12345678');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $data = User::find(auth()->user()->id);
        // dd(User::find(auth()->user()->id));
        $request->validate(
            [
                'name' => 'required',
                'cpf' => 'required',
                // 'email' => 'required',
                'estado_civil' => 'required',
                'endereco' => 'required',
                'date' => 'required',
                // 'cidade' => 'required',
                // 'uf' => 'required',
                // 'nacionalidade' => 'required',
                // 'natural' => 'required',
                // 'rg' => 'required',
            ]
        );

        $data->name = $request->name;
        $data->date = $request->date;
        $data->cpf = $request->cpf;
        $data->matricula = $request->matricula;
        $data->sexo = $request->sexo;
        $data->profissao = $request->profissao;
        $data->estado_civil = $request->estado_civil;
        $data->endereco = $request->endereco;
        $data->email = $request->email; //email
        $data->update();
        return redirect()->back()->with('msg', 'Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function foto(Request $request, $id)
    {
        $request->validate([
            'img' => 'required'
        ]);
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('upload/fotoperfil/'), $imageName);
            $data = User::find($id);
            $data->img = $imageName;
            $data->update();
            return redirect()->back()->with('msg', 'Foto alterada com sucesso!');
        }
    }

    public function view($id)
    {
        $data = User::find($id);
        return view('admin.pages.users.view', compact('data'));
    }

    public function reset()
    {
        return view('admin.pages.users.reset-password');
    }

    public function resetupdate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('msg', 'Senha alterada com sucesso!');
    }
}
