<!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ __('Admin Dashboard') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->image }}, {{ asset('public/image/avatar.png') }}" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="{{ route('member.profile.edit') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a  class="nav-link {{ request()->routeIs('admin.restaurants.index') ? 'active':'' }}" aria-current="page" href="{{ route('admin.restaurants.index') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ __('Restaurants') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a  class="nav-link {{ request()->routeIs('admin.managers.index') ? 'active':'' }}" aria-current="page" href="{{ route('admin.managers.index') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ __('Managers') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.tables.index') ? 'active':'' }}" aria-current="page" href="{{ route('admin.tables.index') }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                {{ __('Tables') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.reservation.index') ? 'active':'' }}" aria-current="page" href="{{ route('admin.reservation.index') }}">
              <i class="nav-icon fas fa-edit"></i>
              <span class="badge badge-danger right">6</span>
              <p>
                {{ __('Reservation') }}
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->