<div class="mt-5">
  @auth
  <button class="button is-primary js-modal-trigger" data-target="modal-js-example">Hacer un comentario</button>
  <div id="modal-js-example" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <!-- Aquí puedes colocar cualquier otro elemento de Bulma que desees -->
        <div class="box">
            <h1 class="title">Nuevo Comentario</h1>
            <form action="{{ route('comentario.create')}}" method="post">
              @csrf
              <input type="hidden" value="{{ Auth::user()->id }}" name="user1">
              @foreach ($post as $i)
                <input type="hidden" value="{{ $i->id }}" name="id_post"> 
              @endforeach
              <textarea class="textarea" name="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
              <br>
              <button type="submit" class="button is-success">Enviar Comentario</button>
            </form>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
  </div>
  @endauth

    <article class="message is-primary mt-5">
        <div class="message-body">
          @foreach ($comentario as $item)
            @foreach ($post as $it)
                @if ($it->id == $item->id_post)
                  @foreach ($user as $i)
                  @if ($i->id == $item->id_user1)
                  <div class="media is-mobile is-centered is-vcentered">
                    <div class="media-left">
                      <figure class="">
                        <img src="
                        
                        @if( $i->avatar  )
                        {{ asset($i->avatar) }}
                        
                        @else
    
                        https://images.unsplash.com/photo-1539548748613-cbb5c997f604?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D
    
                        @endif

                        " class="image is-64x64" alt="User {{ $i->name }}">
                      </figure>
                    </div>
                    <div class="media-content">
                      <p>
                        <strong>{{ $i->name }}</strong>
                        <small> {{ $item->created_at }} </small>
                        <br />
                        {{ $item->comentario }}
                      </p>
                    </div>

                  </div>                  
                  @endif
                @endforeach

                @endif
            @endforeach
          @endforeach
  
          @auth

          @endauth
        </div>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session("success"))
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
      document.addEventListener('DOMContentLoaded', () => {
          // Obtener todos los elementos que actúan como trigger del modal
          const triggers = document.querySelectorAll('.js-modal-trigger');
      
          triggers.forEach(trigger => {
              trigger.addEventListener('click', () => {
                  const target = trigger.dataset.target;
                  const $target = document.getElementById(target);
                  $target.classList.add('is-active');
              });
          });
      
          // Obtener todos los botones de cierre de modal
          const closeButtons = document.querySelectorAll('.modal-close');
      
          closeButtons.forEach(button => {
              button.addEventListener('click', () => {
                  const modals = document.querySelectorAll('.modal');
                  modals.forEach(modal => {
                      modal.classList.remove('is-active');
                  });
              });
          });
      
          // Opción para cerrar el modal al hacer clic en el fondo
          const modalBackgrounds = document.querySelectorAll('.modal-background');
          modalBackgrounds.forEach(bg => {
              bg.addEventListener('click', () => {
                  const modals = document.querySelectorAll('.modal');
                  modals.forEach(modal => {
                      modal.classList.remove('is-active');
                  });
              });
          });
      });
      </script>
      
</div>