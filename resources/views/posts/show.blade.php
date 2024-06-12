@extends('layout')

@section('titulo')
    Historia|Creepypasta
@endsection

@section('contenido')

<section class="hero ">
            <div class="hero-body">
                < class="container">
                @foreach ($post as $i)
                    @foreach ($report as $it)
                        @if($it->post_id == $i->id)
                            El creador de este post esta bajo siendo inspeccionado
                        @else
                        <div class="columns">
                            <div class="column is-8 is-offset-2">
                            <figure class="image is-16by9">
                                <img src="

                                @if( $i->image  )
                                {{ asset($i->image) }}
                                
                                @else

                                https://images.unsplash.com/photo-1595452767427-0905ad9b036d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8YXNrfGVufDB8fDB8fHww

                                @endif
                                
                                " alt="blog image"
                                > 
                            </figure>
                            </div>
                        </div>
                
                        <section class="section">
                            <div class="columns">
                                <div class="column is-8 is-offset-2">
                                    <div class="content is-medium">
                                        <h2 class="subtitle is-4">
                                            @foreach ($user as $item)
                                                @if ($i->id_perfil == $item->id)
                                                    Historia de <a href="{{route('index.profile', $item->id ) }}" class="">{{ $item->name }}</a>
                                                @endif
                                            @endforeach
                                        </h2>
                                        <h2 class="subtitle is-6">{{ $i->created_at }}</h2>
                                        <div class="control"><span class="tag is-info is-uppercase "> {{ $i->categoria }} </span></div>
                        
                                        <h1 class="title">{{ $i->titulo }}</h1>
                                        <p>
                                            {!! $i->descripcion !!}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>      
                        <section class="section">
                            <h3 class="title">Comentarios</h3>

                            @include('components.comentarios')
                        </section>     
                        
                        <form action="{{ route('report.post', $i->id) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="field">
                                <label class="label">Si encuentras algo inapropiado, reportalo</label>
                                <p class="is-size-7 mb-2">Maximo 255 caracteres</p>
                                <div class="control">
                                    <textarea class="textarea" name="reason" placeholder="Describe el problema"></textarea>
                                </div>
                            </div>
                            <div class="control">
                                <button type="submit" class="button is-danger">Reportar Historia</button>
                            </div>
                        </form>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </section>


@endsection