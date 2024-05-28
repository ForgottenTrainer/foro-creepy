@extends('layout')

@section('titulo')
    Tus Posts
@endsection



@section('contenido')
@if (session('success'))
<div class="notification is-primary is-light">
    {{ session('success') }}
  </div>
@endif
<div class="table-container box">
    <table class="table">
      <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Subtitulo</th>
        <th>Categoria</th>
        <th>Accion</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($post as $i)
        <tr>
            <td>{{ $i->id }}</td>
            <td>{{ $i->titulo }}</td>
            <td>{{ $i->subtitulo }}</td>
            <td>{{ $i->categoria }}</td>
            <td>
              <div class="buttons">
                <a href="{{ route('edit.post', $i->id) }}" class="button is-primary">Editar</a>
                <form method="POST" action="{{ route('delete.post', $i->id) }}">
                  @method('DELETE')
                  @csrf
                  <button class="button is-danger" type="submit">Eliminar</button>
                </form>
              </div>
            </td>
        </tr>        
        @endforeach

      </tbody>
    </table>
    
</div>
@endsection