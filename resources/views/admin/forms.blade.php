@extends('admin.layout')

<div id="app">

  @include('components.navadmin')
  @include('components.aside')

  <section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li>Admin</li>
            <li>Formulario</li>
          </ul>
        </div>
      </div>
      <div class="level-right">
      </div>
    </div>
  </section>
  <section class="hero is-hero-bar">
    <div class="hero-body">
      <div class="level">
        <div class="level-left">
          <div class="level-item"><h1 class="title">
            Formulario Administrador
          </h1></div>
        </div>
        <div class="level-right" style="display: none;">
          <div class="level-item"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section is-main-section">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-ballot"></i></span>
          Formulario
        </p>
      </header>
      <div class="card-content">
        <form action="{{ route('admin.create') }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Usuario</label>
            </div>
            <div class="field-body">
              <div class="field">
                <p class="control is-expanded has-icons-left">
                  <input class="input" type="text" name="name" placeholder="Nombre">
                  <span class="icon is-small is-left"><i class="mdi mdi-account"></i></span>
                </p>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label"></div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field has-addons">

                  <p class="control is-expanded">
                    <input class="input" name="email" type="email" placeholder="Correo">
                  </p>
                </div>
                <p class="help">Recuerda poner un correo valido.</p>
              </div>
            </div>
            
          </div>
          <div class="field is-horizontal">
            <div class="field-label"></div>
            <div class="field-body">
              <div class="field is-expanded">
                <div class="field has-addons">
                  <p class="control is-expanded">
                    <input class="input" name="password" type="password" placeholder="Contrasena">
                  </p>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" class="button is-primary">
                      <span>Subir</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
            <label class="file-label">
              <input class="file-input" type="file" name="avatar" />
              <span class="file-cta">
                <span class="file-icon">
                    <i class="fas fa-upload"></i>
                </span>
                <span class="file-label"> Subir imagen</span>
              </span>
            </label>  
          </div>
        </form>
      </div>
    </div>

  </section>


  <div id="sample-modal" class="modal">
    <div class="modal-background jb-modal-close"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Confirm action</p>
        <button class="delete jb-modal-close" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
        <p>This will permanently delete <b>Some Object</b></p>
        <p>This is sample modal</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button jb-modal-close">Cancel</button>
        <button class="button is-danger jb-modal-close">Delete</button>
      </footer>
    </div>
    <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
  </div>
</div>

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