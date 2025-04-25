@extends('home.layouts.app')
@section('title' . 'Recuperar senha')
@section('content')
    <div id="noticias" class="pricing-tables">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><br><br>
                <h2>Recuperar senha</h2><br>
                <span>Enviar link para redefinir senha por e-mail</span>
                <form method="POST" action="{{ route('home.pages.update') }}">
                    @csrf
                    {{-- <label for="E-mail">E-mail</label><br> --}}

                    <!-- Password Reset Token -->
                    {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

                    <div class="flex items-center justify-end mt-4">
                        <input type="email" name="email" class="form-control" placeholder="E-mail cadastrado"><br>
                        <button type="submit" class="btn">Enviar</button>

                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
