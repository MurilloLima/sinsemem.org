@extends('admin.layout.app')
@section('title', 'Atualizar informações')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Meus dados</h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                            {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger text-center" style="margin: 10px;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="text-align: center">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('msg'))
                            <div class="row text-center">
                                <div class="col-md-12" \>
                                    <div class="alert alert-success text-center" style="color: white; margin: 10px;">
                                        {{ session('msg') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Atualizar informações</h3>
                            </div>
                            <form action="{{ route('admin.pages.user.update', [auth()->user()->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="hidden" name="statu">
                                            <label for="">Nome completo</label>
                                            <input type="text" class="form-control" name="name" required
                                                value="{{ auth()->user()->name }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="">CPF</label>
                                            <input type="text" class="form-control" required name="cpf"
                                                value="{{ auth()->user()->cpf }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="Data nascimento">Data nascimento</label>
                                            <input type="date" class="form-control" required
                                                value="{{ auth()->user()->date }}" name="date">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="">Matricula</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->matricula }}" required name="matricula">
                                        </div>
                                        <div class="col-3">
                                            <label for="">Sexo</label>
                                            <select name="sexo" class="form-control" required>
                                                <option value="{{ auth()->user()->sexo }}" selected>
                                                    {{ auth()->user()->sexo }}</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Feminino">Feminino</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Profissão</label>
                                            <input type="text" class="form-control" required
                                                value="{{ auth()->user()->profissao }}" name="profissao">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="">Estado civil</label>
                                            <select name="estado_civil" class="form-control" required>
                                                <option value="{{ auth()->user()->estado_civil }}" selected>
                                                    {{ auth()->user()->estado_civil }}</option>
                                                <option value="Solteiro">Solteiro</option>
                                                <option value="Casado">Casado</option>
                                                <option value="Divorciado">Divorciado</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="">Endereço</label>
                                            <input type="text" class="form-control" required
                                                value="{{ auth()->user()->endereco }}" name="endereco">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">E-mail</label>
                                            <input type="email" required name="email"
                                                value="{{ auth()->user()->email }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
