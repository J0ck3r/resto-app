@extends('layouts.member')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('Menu') }}</h3>
                <div class="float-right input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                </div>
              </div>
            </div>
              <div class="card-body">
                <table id="manager" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Town') }}</th>
                    <th>{{ __('Restaurant') }}</th>
                    <th style="width: 40px">{{ __('Action') }}</th>
                  </tr>
                  </thead>
                  @foreach ($managers as $manager)
                  @if (Auth::user()->id === $manager->user_id)
                  <tbody>
                  <tr>
                    <td><img src="{{ Storage::url($manager->image) }}" class="h-16 w-16 rounded"></td>
                    <td>{{ $manager->name }}</td>
                    <td>{{ $manager->town }} {{ __('€') }}</td>
                    <td>{{ $manager->restaurant }}</td>
                    <td class="vert-align">
                      <div class="flex space-x-2">
                      <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('admin.managers.edit', $menu->id) }}" role="button">{{ __('Edit') }}</a>
                      <p>
                      <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-center text-white" method="POST" action="{{ route ('admin.managers.destroy', $menu->id) }}" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ __('Delete') }}</button>
                      </form>
                    </p>
                    </div>
                  </td>
                </tr>
                @endif
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