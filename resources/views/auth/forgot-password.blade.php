@extends('home.layouts.app')
@section('title', 'Recuperar senha')
@section('content')
    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <br><br><br>
                    <!-- Session Status -->
                    <x-auth-session-status style="border-radius: 20px; padding: 10px; text-align: center"
                        class="mb-4 btn-success text-center" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
                        </div>
                        <br>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
@endsection
