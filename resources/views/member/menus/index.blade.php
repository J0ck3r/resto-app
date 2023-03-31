@extends('layouts.auth')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <div class="card-tools float-right">
                    <a class="btn btn-block btn-success btn-sm" href="{{ route('member.menus.create') }}" role="button">{{ __('New Menu') }}</a>
                  </div>
                </h3> 
                  <div class="float-right input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @foreach($nonDeletedMenus->merge($softDeletedMenus) as $menu)
                @if($menu->deleted_at)
                <table class="table table-bordered">
                <p>
                  @else
                  <table class="table table-bordered table-hover">
                    @endif
                    @endforeach
                  <thead style="text-align: center">
                    <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Price') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th style="width: 40px">{{ __('Action') }}</th>
                  </tr style="text-align: center">
                  </thead>
                  @foreach ($restaurants as $restaurant)
                  @foreach($nonDeletedMenus->merge($softDeletedMenus) as $menu)
                  @if ($menu->restaurant_id === $restaurant->id)
                  <tbody>
                    <tr @if($menu->deleted_at) style="background-color: grey;" @endif>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>{{ $menu->price }} {{ __('$') }}</td>
                    <td><img src="{{ Storage::url($menu->image) }}" class="h-16 w-16 rounded d-block mx-auto"></td>
                    <td class="vert-align">
                      <div class="flex space-x-2">
                        @if($menu->deleted_at)
                       <a class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-center text-white" href="{{ route('member.menus.restore', $menu->id) }}" role="button" onclick="event.preventDefault(); document.getElementById('restore-menu-form-{{ $menu->id }}').submit();">{{ __('Restore') }}</a>
                        <form id="restore-menu-form-{{ $menu->id }}" action="{{ route('member.menus.restore', $menu->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PATCH')
                        </form>
                          <p>
                          <form class="px-4 py-2 bg-red-700 hover:bg-red-900 rounded-lg text-center text-white" method="POST" action="{{ route ('member.menus.force-delete', $menu->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to permanently delete this menu?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ __('Permanently Delete') }}</button>
                          </form>
                        @else
                          </p>
                          <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('member.menus.edit', $menu->id) }}" role="button">{{ __('Edit') }}</a>
                          <p>
                          <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-center text-white" method="POST" action="{{ route ('member.menus.destroy', $menu->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this menu?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">{{ __('Delete') }}</button>
                          </form>
                          </p>
                        @endif
                    </div>
                  </td>
                </tr>
                @endif
                @endforeach
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>  
@endsection