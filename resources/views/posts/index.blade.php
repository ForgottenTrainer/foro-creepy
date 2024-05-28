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
                <button class="button is-danger" onclick="confirmDelete( {{ $i->id }} )">Eliminar</button>
                <form id="delete-form-{{ $i->id }}" method="POST" action="{{ route('delete.post', $i->id) }}" style="display: none;">
                  @method('DELETE')
                  @csrf
                </form>
              </div>
            </td>
        </tr>        
        @endforeach

      </tbody>
    </table>
    
</div>

<script>
function confirmDelete(postId) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, bórralo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + postId).submit();
        }
    });
}
</script>

@endsection