<div class="sidebar" data-color="orange">
    <div class="logo">
      <a href="#" class="simple-text logo-mini">
         <img src="{{ asset('frontend/images/Logo_main.png')  }}" alt="logo" class="w-100">
      </a>
      <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
        mama's kitchen
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li class="{{ 'admin/dashboard' == request()->path() ?'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="{{ ('admin/slider' == request()->path())?'active':'' }}">
          <a href="{{ route('slider.index') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>Slider</p>
          </a>
        </li>
        <li class="{{ ('admin/category' == request()->path())?'active':'' }}">
          <a href="{{ route('category.index') }}">
            <i class="now-ui-icons location_map-big"></i>
            <p>Category</p>
          </a>
        </li>
        <li class="{{ ('admin/item' == request()->path())?'active':'' }}">
          <a href="{{ route('item.index') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>Items</p>
          </a>
        </li>
        <li class="{{ ('admin/reservations' == request()->path())?'active':'' }}">
          <a href="{{ route('reservations') }}">
            <i class="now-ui-icons users_single-02"></i>
            <p>Reservations</p>
          </a>
        </li>
        <li class="{{ ('admin/messages' == request()->path())?'active':'' }}">
          <a href="{{ route('messages') }}">
            <i class="now-ui-icons design_bullet-list-67"></i>
            <p>Messages</p>
          </a>
        </li>
        <li class="active-pro {{ 'admin/admins'  == request()->path() ?'active':'' }}">
          <a href="{{ route('admins') }}">
            <i class="now-ui-icons users_circle-08"></i>
            <p>Admins</p>
          </a>
        </li>
      </ul>
    </div>
  </div>