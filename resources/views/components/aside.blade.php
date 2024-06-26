<aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Admin</b> Rhampherios</span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li>
          <a href="{{ route('index.admin', Auth::id()) }}" class="has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Panel de control</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Secciones</p>
      <ul class="menu-list">
        <li>
          <a href="{{ route('index.table', Auth::id()) }}" class="has-icon">
            <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
            <span class="menu-item-label">Tabla de usuarios</span>
          </a>
        </li>
        <li>
          <a href="{{ route('index.forms', Auth::id()) }}" class="has-icon">
            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
            <span class="menu-item-label">Formulario admin</span>
          </a>
        </li>
        <li>
          <a href="{{ route('edit.user', Auth::id()) }}" class="has-icon">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            <span class="menu-item-label">Perfil</span>
          </a>
        </li>
        <li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-view-list"></i></span>
            <span class="menu-item-label">Submenus</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="{{ route('index.reportes', Auth::id()) }}">
                <span>Reportados</span>
              </a>
            </li>
            <li>
              <a href="{{ route('index.apelacion', Auth::id()) }}">
                <span>Apelaciones</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>