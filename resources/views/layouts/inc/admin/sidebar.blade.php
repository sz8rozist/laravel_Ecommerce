<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Kezdőlap</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">Kategóriák</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/kategoria/create')}}">Új kategória</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/kategoria')}}">Kategóriák megtekintése</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
          <i class="mdi mdi-plus-outline menu-icon"></i>
          <span class="menu-title">Termékek</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/product/create')}}">Új termék</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('admin/product')}}">Termékek megtekintése</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/order')}}">
          <i class="mdi mdi-car menu-icon"></i>
          <span class="menu-title">Rendelések</span>
        </a>
      </li>
    </ul>
  </nav>
