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
                <li>Reportes</li>
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
                Usuarios reportados
              </h1></div>
            </div>
            <div class="level-right" style="display: none;">
              <div class="level-item"></div>
            </div>
          </div>
        </div>
      </section>

      <div class="card-content">
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards">
            <table class="table is-fullwidth is-striped is-hoverable is-sortable">
            <thead>
                <tr>
                    <th>Reportado Por</th>
                    <th>Usuario Reportado</th>
                    <th>Historia Reportada</th>
                    <th>Razon</th>
                    <th>Cuando se creo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td data-label="Reported By">{{ $report->user->name }}</td>
                        <td data-label="Reported User">{{ $report->reportedUser->id ?? 'N/A' }}</td>
                        <td data-label="Reported Post">{{ $report->post->id ?? 'N/A' }}</td>
                        <td data-label="Reason">{{ $report->reason }}</td>
                        <td data-label="Created">
                            <small class="has-text-grey is-abbr-like" title="{{ $report->created_at->format('M d, Y') }}">{{ $report->created_at->format('M d, Y') }}</small>
                        </td>
                        <td class="is-actions-cell">
                            <div class="buttons">
                                <a href="{{ route('posts.show', $report->post->id) }}" class="button is-small is-primary" type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>
            <div class="notification">
              <div class="level">
                <div class="level-left">
                  <div class="level-item">
                    <div class="buttons has-addons">
                      <button type="button" class="button is-active">1</button>
                      <button type="button" class="button">2</button>
                      <button type="button" class="button">3</button>
                    </div>
                  </div>
                </div>
                <div class="level-right">
                  <div class="level-item">
                    <small>Page 1 of 3</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection