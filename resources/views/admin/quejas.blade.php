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
              <li>Apelaciones</li>
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
              Apelaciones de usuarios
            </h1></div>
          </div>
          <div class="level-right" style="display: none;">
            <div class="level-item"></div>
          </div>
        </div>
      </div>
    </section>
@endsection
