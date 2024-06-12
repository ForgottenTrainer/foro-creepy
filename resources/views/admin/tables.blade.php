@extends('admin.layout')

@section('contenido')


<div id="app">
  @include('components.navadmin')
  @include('components.aside')
  <section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li>Admin</li>
            <li>Tabla de usuarios</li>
          </ul>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
        </div>
      </div>
    </div>
  </section>
  <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="title">
            Tabla de usuarios
          </h1></div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <div class="field has-addons">
      <div class="control">
        <input class="input" type="text" placeholder="Encuentra un usuario">
      </div>
      <div class="control">
        <button class="button is-info">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>
    </div>
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Usuarios
        </p>
      </header>
      <div class="card-content">
        <div class="b-table has-pagination">
          <div class="table-wrapper has-mobile-cards">
            <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
              <thead>
              <tr>
                <th class="is-checkbox-cell">
                ID
                </th>
                <th></th>
  
                <th>Nombre</th>
                <th>Correo</th>
                <th>Creacion</th>
                <th>Acciones</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($users as $i)
                <tr>
                    <td class="is-checkbox-cell">
                        {{ $i->id }}
                    </td>
                    <td class="is-image-cell">
                        <figure class="image is-48x48">
                            <img src="{{ asset($i->avatar) }}" alt="Placeholder image"/>
                        </figure>   
                    </td>
                    <td data-label="Name">{{ $i->name }}</td>
                    <td data-label="Company">{{ $i->email }}</td>
                    <td data-label="City">{{ $i->created_at }}</td>
                    <td class="is-actions-cell">
                        <div class="buttons">

                            @if($i->id != '1')
                            <a href="{{ route('edit.user', $i->id) }}" class="button is-small is-primary" type="button">
                                <span class="icon"><i class="mdi mdi-eye"></i></span>
                            </a>

                            <button class="button is-small is-danger jb-modal" onclick="confirmDelete({{ $i->id }})" type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </button>

                            <form id="delete-form-{{ $i->id }}" method="POST" action="{{ route('delete.user', $i->id) }}" style="display: none;">
                                @method('DELETE')
                                @csrf
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="notification">
              <div class="level">
                <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                  <a href="{{ $users->previousPageUrl() }}" class="pagination-previous" {{ $users->onFirstPage() ? 'disabled' : '' }}>Previous</a>
                  <a href="{{ $users->nextPageUrl() }}" class="pagination-next" {{ !$users->hasMorePages() ? 'disabled' : '' }}>Next page</a>
                  <ul class="pagination-list">
                      @foreach ($users->links() as $link)
                      <li><a href="{{ $link->url }}" class="pagination-link {{ $link->active ? 'is-current' : '' }}">{{ $link->label }}</a></li>
                      @endforeach
                  </ul>
                </nav>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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