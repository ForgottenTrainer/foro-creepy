@extends('layout')

@section('titulo')
    Crear post
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

            <div class="card">
                <div class="card-content">
                    <form action="{{ route('index.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_perfil" value="{{ Auth::user()->id }}">
                        
                        <div class="field">
                            <label class="label">Titulo</label>
                            <div class="control">
                                <input class="input" name="titulo" type="text" placeholder="Noticia de ultima hora">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Subtitulo (opcional)</label>
                            <div class="control">
                                <input class="input" name="subtitulo" type="text" placeholder="">
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
                                <textarea class="textarea" name="descripcion" id="editor" placeholder="Introduce contenido aquí"></textarea>
                            </div>
                        </div>

                        <div class="file has-name is-primary">
                            <label class="file-label">
                                <input class="file-input" type="file" name="image" accept="image/*">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">Subir imagen (opcional)</span>
                                </span>
                            </label>
                        </div>

                        <div class="field">
                            <button type="submit" class="button is-info">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="column">
            <figure class="image is-4by3">
                <img src="https://images.unsplash.com/photo-1500989145603-8e7ef71d639e?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="blog">
            </figure>
        </div>
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
        <script>
            const dropdownTrigger = document.querySelector('.dropdown-trigger');
            const dropdownMenu = document.querySelector('.dropdown-menu');
        
            dropdownTrigger.addEventListener('click', () => {
              dropdownMenu.classList.toggle('is-active');
            });
        </script>
    </div>
@endsection