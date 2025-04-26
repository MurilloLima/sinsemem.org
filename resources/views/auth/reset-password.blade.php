@extends('home.layouts.app')
@section('title', 'Recuperar senha')
@section('content')
    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h2>Resetar senha de acesso</h2>
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{ old('email', $request->email) }}"
                                class="form-control">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="">Senha</label>
                            <input type="password" name="password" class="form-control">
                            <x-input-error :messages="$errors->get('password')" style="color: red" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label for="">Confirmar senha</label>
                            <input type="password" name="password_confirmation" class="form-control">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />
                        </div>
                        <br>
                        <input type="submit" value="Resetar senha" class="btn">
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
@endsection
