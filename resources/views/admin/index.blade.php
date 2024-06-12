@extends('admin.layout')

    @include('components.navadmin')
    @include('components.aside')
  
  
    <section class="section is-title-bar">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            <ul>
              <li>Admin</li>
              <li>Panel de control</li>
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
              Panel de Control
            </h1></div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section is-main-section">
      <div class="tile is-ancestor">
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label"><h3 class="subtitle is-spaced">
                    Usuarios
                  </h3>
                    <h1 class="title">
                      {{ $users->count() }}
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-primary is-large"><i
                      class="mdi mdi-account-multiple mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label"><h3 class="subtitle is-spaced">
                    Historias|Creepypastas
                  </h3>
                    <h1 class="title">
                    {{ $posts->count() }}
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon">
                    <span class="icon has-text-info is-large">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mdi mdi-cart-outline mdi-48px">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                      </svg>
                      
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tile is-parent">
          <div class="card tile is-child">
            <div class="card-content">
              <div class="level is-mobile">
                <div class="level-item">
                  <div class="is-widget-label"><h3 class="subtitle is-spaced">
                    Rendimiento
                  </h3>
                    <h1 class="title">
                      256%
                    </h1>
                  </div>
                </div>
                <div class="level-item has-widget-icon">
                  <div class="is-widget-icon"><span class="icon has-text-success is-large"><i
                      class="mdi mdi-finance mdi-48px"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-finance"></i></span>
            Performance
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="chart-area">
            <div style="height: 100%;">
              <div class="chartjs-size-monitor">
                <div class="chartjs-size-monitor-expand">
                  <div></div>
                </div>
                <div class="chartjs-size-monitor-shrink">
                  <div></div>
                </div>
              </div>
              <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor" style="display: block; height: 400px; width: 1197px;"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="card has-table has-mobile-sort-spaced">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
            Usuarios
          </p>
          <a href="#" class="card-header-icon">
            <span class="icon"><i class="mdi mdi-reload"></i></span>
          </a>
        </header>
        <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
              <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth">
                <thead>
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Creado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $i)
                  <tr>
                    <td class="is-image-cell">
                      <div class="image">
                        <img src="{{ asset($i->avatar) }}" class="is-rounded">
                      </div>
                    </td>
                    <td data-label="Name">{{ $i->name }}</td>
                    <td data-label="Company">{{ $i->email }}</td>
                    <td data-label="Created">
                      <small class="has-text-grey is-abbr-like" title="Oct 25, 2020">{{ $i->created_at }}</small>
                    </td>
                    <td class="is-actions-cell">
                      <div class="buttons is-right">

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
            <hr>

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