@extends('layout')

@section('titulo', 'Resultados de búsqueda')

@section('contenido')
    <h1>Resultados de Búsqueda</h1>
    @if($posts->isEmpty())
        <p>No se encontraron posts que coincidan con tu búsqueda.</p>
    @else
        <div class="columns is-multiline">
            @foreach($posts as $post)
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
                                        <p class="subtitle is-6">@ {{ $item->name }}</p>
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
    @endif
@endsection
