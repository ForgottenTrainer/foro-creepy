@extends('layout')

@section('titulo') 
    Editar Perfil 
@endsection

@section('contenido')
<div class="columns is-multiline">
    <div class="column is-12-mobile is-6-tablet is-half-desktop">
        <div class="card">
            <div class="card-content">
                <div class="content">
                    @if ($errors->any())
                        <div class="notification is-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @foreach ($user as $i)
                    <form action="{{ route('update.user', $i->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                              <input class="input" name="name" type="text" value="{{ $i->name }}" placeholder="John">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Correo</label>
                            <div class="control">
                              <input class="input" name="email" type="email" value="{{ $i->email }}" placeholder="correo@correo.com">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Contraseña</label>
                            <div class="control">
                                <input class="input" name="password" type="password" placeholder="**********">
                            </div>
                        </div>
                        <div class="field">
                            <div class="file is-primary">
                                <label class="file-label">
                                  <input class="file-input" type="file" name="avatar" />
                                  <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label"> Subir imagen</span>
                                  </span>
                                </label>
                            </div>
                        </div>         
                        <button type="submit" class="button is-info">Editar</button>
                        @endforeach
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
