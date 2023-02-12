<!-- Brand Logo -->
    <a href="{{ route('member.index') }}" class="brand-link">
      <span class="brand-text font-weight-light">{{ __('Dashboard') }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->image)
            <img src="{{ asset('storage/image/avatar'.Auth::user()->image) }}" class="img-circle elevation-2">
            @endif
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
                <a  class="nav-link {{ request()->routeIs('member.restaurants.index' ) ? 'active':'' }}" aria-current="page" href="{{ route('member.restaurants.index') }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    {{ __('Restaurants') }}
                  </p>
                </a>
              </li>
         {{--  <li class="nav-item">
            <a  class="nav-link {{ request()->routeIs('member.categories.index') ? 'active':'' }}" aria-current="page" href="{{ route('member.categories.index') }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ __('Categories') }}
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('member.menus.index') ? 'active':'' }}" aria-current="page" href="{{ route('member.menus.index') }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{ __('Menus') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('member.tables.index') ? 'active':'' }}" aria-current="page" href="{{ route('member.tables.index') }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                {{ __('Tables') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('member.reservation.index') ? 'active':'' }}" aria-current="page" href="{{ route('member.reservation.index') }}">
              <i class="nav-icon fas fa-edit"></i>
              <span class="badge badge-danger right">6</span>
              <p>
                {{ __('Reservation') }}
              </p>
            </a>
          </li>
          <li class="nav-item"></a>
            <div class="nav-link">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <li class="nav-item d-none d-sm-inline-block">
                    <button type="submit" class="btn btn-block btn-danger btn-sm">
                      {{ __('Log Out') }}
                    </button>
                  </li>
                </form>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->