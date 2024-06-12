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
                    @if(Auth::user()->status == 'admin')
                    <br>
                        @if($i->report != true)
                            <button class="button is-danger" onclick="confirmDelete( {{ $i->id }} )">
                                <p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="" style="width: 20px; height: 20px;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                </span>
                                Bloquear usuario

                                </p>
                            </button>
                            <form id="delete-form-{{ $i->id }}" method="POST" action="{{ route('report.user', $i->id) }}" style="display: none;">
                                @method('PUT')
                                <input type="hidden" name="report" value="true">

                                @csrf
                            </form>
                        @else
                        <button class="button is-danger" onclick="Unlock( {{ $i->id }} )">
                            <p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="" style="width: 20px; height: 20px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                </svg>
                            </span>
                            Desbloquear usuario

                            </p>
                        </button>
                        <form id="unlock-user-{{ $i->id }}" method="POST" action="{{ route('report.user.unlock', $i->id) }}" style="display: none;">
                            @method('PUT')
                            <input type="hidden" name="report" value="true">

                            @csrf
                        </form>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="column is-12-mobile is-6-tablet is-half-desktop">
        <figure class="image is-4by3">
            <img src="{{ asset('images/Capture.PNG') }}" alt="blog">
        </figure>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    function confirmDelete(postId) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Recuerda revisar bien al usuario!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, bloquealo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + postId).submit();
            }
        });
    }
    </script>

    <script>
        function Unlock(postId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Estas apunto de desbloquear al usuario!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, desbloquealo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('unlock-user-' + postId).submit();
                }
            });
        }
    </script>
</div>
@endsection
