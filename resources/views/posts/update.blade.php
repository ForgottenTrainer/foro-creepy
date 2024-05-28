@extends('layout')

@section('titulo')
    Editar post
@endsection

@section('contenido')
    <div class="columns is-multiline">
        <div class="column is-three-fifths">
            @if (session('success'))
            <div class="notification is-primary is-light">
                {{ session('success') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @foreach ($post as $i)
            <div class="card">
                <div class="card-content">
                    <form action="{{ route('update.post', $i->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id_perfil" value="{{ Auth::user()->id }}">

                        <div class="field">
                            <label class="label">Titulo</label>
                            <div class="control">
                                <input class="input" value="{{ $i->titulo }}" name="titulo" type="text" placeholder="Noticia de ultima hora">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Subtitulo (opcional)</label>
                            <div class="control">
                                <input class="input" value="{{ $i->subtitulo }}" name="subtitulo" type="text" placeholder="">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Categoría</label>
                            <div class="control">
                                <div class="select">
                                    <select name="categoria">
                                        <option value="">Seleccionar categoría</option>
                                        <option value="fantasmas">Fantasmas</option>
                                        <option value="demonios">Demonios</option>
                                        <option value="monstruos">Monstruos</option>
                                        <option value="creepypastas">Creepypastas</option>
                                        <option value="leyendas_urbanas">Leyendas Urbanas</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="field">
                            <label class="label">Descripción</label>
                            <div class="control">
                                <textarea class="textarea" name="descripcion" id="editor" placeholder="Introduce contenido aquí">
                                    {!! $i->descripcion !!}
                                </textarea>
                            </div>
                        </div>

                        <div class="file is-primary">
                            <label class="file-label">
                                <input class="file-input" type="file" name="image" accept="image/*">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                        </svg>
                                    </span>
                                    <span class="file-label"> Subir imagen (opcional)</span>
                                </span>
                            </label>
                        </div>

                        <button type="submit" class="button is-info">Editar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="column">
            <figure class="image is-4by3">
                <img src="https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="blog">
            </figure>
        </div>
                
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                    .create( document.querySelector( '#editor' ) )
                    .then( editor => {
                            console.log( editor );
                    } )
                    .catch( error => {
                            console.error( error );
                    } );
        </script>
    </div>
@endsection

