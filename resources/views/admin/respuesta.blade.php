@extends('admin.layout')

@section('contenido')
    @include('components.navadmin')
    @include('components.aside')

    @if (session('error'))
      <script>
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "{{ session('error') }}",
        });
      </script>
    @endif

    @if (session('message'))
      <script>
        Swal.fire({
          icon: "success",
          title: "{{ session('message') }}",
          showConfirmButton: false,
          timer: 1500
        });
      </script>
    @endif
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Apelaciones</li>
              <li>Responder</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="hero is-hero-bar">
      <div class="hero-body">
        <div class="level">
          <div class="level-left">
            <div class="level-item"><h1 class="title">
              Responder a usuario 
            </h1></div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <div class="card-content">
        <p class="">
            <span class="has-text-weight-bold">Apelaciones del usuario:</span>
            {{ $apelacion->apelamiento }}
        </p>

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $hasResponse = !is_null($apelacion->response);  
        @endphp

        <hr>

        @if ($hasResponse)
            <p class="p-3 has-background-success rounded has-text-primary-light" style="border-radius: 10px;">
                Ya has respondido a este post.
            </p>
        @else
          <form action="{{ route('apelacion.show', $apelacion->id) }}" method="post">
              @method('put')
              @csrf

              <input type="hidden" name="id_apelacion" value="{{ $apelacion->id }}">
              <textarea class="textarea" name="respuesta" placeholder="Responder a usuario"></textarea>
              
              <button type="submit" class="button is-small is-info mt-5">Enviar respuesta</button>
          </form>
        @endif


        <hr>
        <h3 class="title">Actualizar Estado</h3>
        <form action="" method="post">
            @csrf
            @method('PUT')

            <div class="columns">
              <div class="column">
                <button class="button is-warning">Pendiente</button>
              </div>
              <div class="column">
                <button class="button is-info">Observacion</button>
              </div>
              <div class="column">
                <button class="button is-success">Resuelto</button>
              </div>
            </div>
        </form>
    </div>