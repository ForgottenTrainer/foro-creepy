@extends('layout')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="columns is-multiline">
        <div class="column is-12-mobile is-6-tablet is-half-desktop">
            <div class="card">
                <div class="card-content">
                    <div class="content">
                        @if (session('error'))
                            <div class="notification is-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="field">
                                <label class="label">Correo</label>
                                <div class="control">
                                    <input class="input" name="email" type="email" placeholder="correo@correo.com">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Contraseña</label>
                                <div class="control">
                                    <input class="input" name="password" type="password" placeholder="******">
                                </div>
                            </div>
                            <button type="submit" class="button is-info">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-12-mobile is-6-tablet is-half-desktop">
            <figure class="image is-4by3">
                <img src="{{ asset('images/Capture.PNG') }}" alt="blog">
            </figure>
        </div>
    </div>
@endsection
