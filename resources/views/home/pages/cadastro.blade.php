@extends('home.layouts.app')
@section('title', 'Cadastro')

@section('content')
    <div id="modal" class="popupContainer" style="display:none;">
        <div class="popupHeader">
            <span class="header_title">Login</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </div>

        <section class="popupBody">

            <!-- Register Form -->
            {{-- <div class="user_register">
                <form>
                    <label>Full Name</label>
                    <input type="text" />
                    <br />

                    <label>Email Address</label>
                    <input type="email" />
                    <br />

                    <label>Password</label>
                    <input type="password" />
                    <br />

                    <div class="checkbox">
                        <input id="send_updates" type="checkbox" />
                        <label for="send_updates">Send me occasional email updates</label>
                    </div>

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i>
                                Back</a></div>
                        <div class="one_half last"><a href="#" class="btn btn_red">Register</a></div>
                    </div>
                </form>
            </div> --}}
        </section>
    </div>


    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 align-self-center" style="color: white">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="cadastro" style="background-color: #c90014">
                                        <form action="{{ route('home.pages.user.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="role" value="2">

                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center">
                                                    <h1>Cadastrar-se</h1>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    @if ($errors->any())
                                                        <div class="text-center"
                                                            style="margin: 10px; background-color: red; color: #FFF;">
                                                            <ul style="text-align: center">
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if (session('msg'))
                                                        <div class="row text-center">
                                                            <div class="col-md-12">
                                                                <div class="alert text-center"
                                                                    style="color: #000; margin: 10px; text-align: center; background-color: olivedrab">
                                                                    {{ session('msg') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Nome</label><br>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Nome completo">
                                                        <input type="hidden" name="statu" value="2">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Data nascimento</label><br>
                                                    <input type="date" name="date" class="form-control" placeholder=""
                                                        required>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">CPF</label><br>
                                                    <input type="text" class="form-control" name="cpf"
                                                        placeholder="000.000.000-00">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Matricula</label><br>
                                                    <input type="text" name="matricula" class="form-control"
                                                        placeholder="000000">
                                                </div>

                                                <div class="col-md-3">
                                                    <label for="Sexo">Sexo</label><br>
                                                    <select name="sexo" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Feminino">Feminino</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Profissão</label><br>
                                                    <input type="text" class="form-control" name="profissao"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label for="">Estado civil</label>
                                                    <select name="estado_civil" class="form-control">
                                                        <option value=""></option>
                                                        <option value="Solteiro">Solteiro</option>
                                                        <option value="Casado">Casado</option>
                                                        <option value="Divorciado">Divorciado</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-8">
                                                    <label for="">Endereço</label><br>
                                                    <input type="text" class="form-control" name="endereco"
                                                        placeholder="Rua...">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <h4>Informações de acesso</h4>
                                                <div class="col-md-6">
                                                    <label for="">E-mail</label><br>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Senha</label>
                                                    <input type="password" name="password" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Confirmar senha</label>
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <br>
                                                    <input type="submit" value="Cadastrar" class="btn"
                                                        style="background-color: #FFF; color: #000">
                                                </div>
                                            </div>
                                    </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
