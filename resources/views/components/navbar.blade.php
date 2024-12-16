<nav class="navbar" role="navigation" aria-label="main navigation" style="transiton: .3s ease;">
    <div class="navbar-brand">
      <a class="navbar-item " href="/">
        <h3 class="has-text-weight-bold	">Rhampherios Foro</h3>
      </a>
  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a href="/" class="navbar-item">
          Inicio
        </a>

      </div>
  
      <div class="navbar-end">
        <div class="field is-grouped mt-2 mr-2">
          <form action="{{ route('index.search') }}" method="get">
            @csrf
            <div class="field is-grouped">
                <p class="control is-expanded">
                    <input class="input is-primary" name="buscado" type="text" placeholder="Buscar algún post">
                </p>
                <p class="control">
                    <button type="submit" class="button is-info">
                        Buscar
                    </button>
                </p>
            </form>
        </div>
      </div>
      
        <div class="navbar-item has-dropdown is-hoverable">

          @unless (!Auth::check())
            <a class="navbar-link">
              {{ Auth::user()->name }}
            </a>
               
              @if(Auth::user()->report != true)
              <div class="navbar-dropdown">
                <a href="{{ route('index.profile', Auth::user()->id) }}" class="navbar-item">
                  Ver mi perfil
                </a>
                @if (Auth::user()->status == 'admin')
                <a href="{{ route('index.admin', Auth::user()->id) }}" class="navbar-item">
                  Panel de control
                </a>
                @endif
                <a href="{{ route('edit.user', Auth::user()->id) }}" class="navbar-item">
                  Editar Perfil
                </a>
                <a href="{{ route('index.post') }}" class="navbar-item">
                  Crear Post
                </a>
                <a href="{{ route('index.tablero', Auth::user()->id) }}" class="navbar-item">
                  Administar mis posts
                </a>
                <hr class="navbar-divider">
                <a href="{{ route('logout') }}" class="navbar-item">
                  Salir
                </a>   
                @else
                  <p class="navbar-item">
                    Estas baneado
                  </p>
                @endif
              </div> 

              
          @endunless

          @unless (Auth::check())
            <div class="buttons">
              <a href="/register" class="button is-primary">
                <strong>Sign up</strong>
              </a>
              <a href="/login" class="button is-light">
                Log in
              </a>
            </div> 
          @endunless
            </div>
          </div>
        </div>
      </div>
      <button id="theme-toggle" class="button is-danger m-2">
        <span class="icon">
          <i class="fas fa-sun" id="theme-icon"></i>
        </span>
      </button>
    </div>
  </nav>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
    // Obtener todos los elementos "navbar-burger"
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Verificar si hay elementos navbar burger
    if ($navbarBurgers.length > 0) {
      // Añadir un evento click a cada uno de ellos
      $navbarBurgers.forEach(el => {
        el.addEventListener('click', () => {
          // Obtener el target del atributo "data-target"
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          // Alternar las clases "is-active" en el "navbar-burger" y el "navbar-menu"
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });
    }
  });

  </script>