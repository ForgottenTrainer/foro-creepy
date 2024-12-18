@extends('layout')


@section('titulo') Historias @endsection


@section('contenido')

@if(Auth::guest() || (Auth::user()->report != true))

    <div class="mt-5">
        <h3 class="subtitle">Ve los posts más recientes</h3>
        <div class="mt-5">
            <div class="columns is-multiline">
                @foreach ($posts as $post)
                <div class="column is-12-mobile is-6-tablet is-3-desktop">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img
                                    src="{{ $post->image ? asset($post->image) : 'https://images.unsplash.com/photo-1595452767427-0905ad9b036d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8YXNrfGVufDB8fDB8fHww' }}"
                                    alt="Placeholder image"
                                />
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    @foreach ($user as $item)
                                        @if ($item->id == $post->id_perfil)
                                            <figure class="image is-48x48">
                                                <img src="{{ $item->avatar }}" alt="Placeholder image"/>
                                            </figure>                       
                                        @endif
                                    @endforeach
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">{{ $post->titulo }}</p>
                                    <p class="subtitle is-5">{{ $post->subtitulo }}</p>
                                    @foreach ($user as $item)
                                        @if ($item->id == $post->id_perfil)
                                            <a href="{{ route('index.profile', $item->id) }}" class="subtitle is-6 has-text-link">@ {{ $item->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="content">
                                <a href="{{ route('posts.show', $post->id) }}">Ver Post completo</a>
                                <br />
                                <time datetime="{{ $post->created_at }}">{{ $post->created_at->toFormattedDateString() }}</time>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach             
            </div>
        </div>
        <hr>
        <nav class="pagination is-centered" role="navigation" aria-label="pagination">
            <a href="{{ $posts->previousPageUrl() }}" class="pagination-previous" {{ $posts->onFirstPage() ? 'disabled' : '' }}>Previous</a>
            <a href="{{ $posts->nextPageUrl() }}" class="pagination-next" {{ !$posts->hasMorePages() ? 'disabled' : '' }}>Next page</a>
            <ul class="pagination-list">
                @foreach ($posts->links() as $link)
                <li><a href="{{ $link->url }}" class="pagination-link {{ $link->active ? 'is-current' : '' }}">{{ $link->label }}</a></li>
                @endforeach
            </ul>
        </nav>   
    </div>

@else

    <div class="container">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


  
      @if (session('success'))
        <script>
          Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
          });
        </script>
      @endif
      <div class="columns">

        <div class="column is-8 is-offset-2">
          <div class="card">
            <header class="card-header">
              <p class="card-header-title">Cuenta baneada</p>
            </header>
            <div class="card-content">
              <p>Su cuenta ha sido baneada.</p>
              <p>Si cree que esto es un error, por favor contacte a soporte.</p>
              <br>


                @php
                    // Verificamos si el usuario tiene alguna apelación pendiente
                    $hasPendingAppeal = $apelaciones->where('id_user', Auth::user()->id)->where('status', 'Pendiente')->count() > 0;
                @endphp

                @php
                // Verificamos si el usuario tiene alguna apelación pendiente
                    $hasPendingAppeal = $apelaciones->where('id_user', Auth::user()->id)->where('status', 'Terminado')->count() > 0;
                @endphp
                
                @if ($hasPendingAppeal)
                    <p class="p-3 has-background-link rounded has-text-primary-light" style="border-radius: 10px;">
                        Estate atento a la respuesta de algún administrador.
                    </p>
                @else
                    <!-- Solo muestra el formulario si no hay apelaciones pendientes -->
                    <form action="{{ route('apelacion.create') }}" method="POST">
                        @csrf
                        <textarea class="textarea" name="description" placeholder="Envianos un mensaje"></textarea>
                
                        <button class="button is-primary m-2" type="submit">Enviar</button>
                    </form>
                @endif

              <hr>
              <p class="card-header-title">
                Respuesta
              </p>
              <p>
                @foreach ($apelaciones as $item)
                    @if ($item->id_user == Auth::user()->id)
                        {{ $item->respuesta }}
                    @endif
                @endforeach
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    

@endif

@endsection
