@extends('layouts.auth')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
             @if ($count < 1)
                 <h3 class="card-title"><div class="card-tools float-right">
                  <a class="btn btn-block btn-success btn-sm" href="{{ route('member.restaurants.create') }}" role="button">{{ __('Add New Restaurant') }}</a>
                </div></h3> 
               @endif
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
                <table class="table table-bordered table-hover">
                  <thead style="text-align: center">
                    <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Location') }}</th>
                    <th>{{ __('Work Time') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th style="width: 40px">{{ __('Action') }}</th>
                  </tr>
                  </thead>
                  @foreach ($restaurants as $restaurant)
                  @if (Auth::user()->id === $restaurant->user_id)
                  <tbody>
                  <tr style="text-align: center">
                    <td>{{ $restaurant->name }}</a></td>
                    <td>{{ $restaurant->description }}</a></td>
                    <td>{{ $restaurant->location }}</a></td>
                    <td>{{ $restaurant->open_time }} - {{ $restaurant->close_time }}</a></td>
                    <td><img src="{{ Storage::url($restaurant->image) }}" class="h-16 w-16 rounded d-block mx-auto"></a></td>
                    <td class="vert-align">
                      <div class="flex space-x-3">
                      <a class="px-3 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('member.restaurants.edit', $restaurant->id) }}" role="button">{{ __('Edit') }}</a>
                      <form class="px-3 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-center text-white" method="POST" action="{{ route ('member.restaurants.destroy', $restaurant->id) }}" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ __('Delete') }}</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endif
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            {{-- 
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>  
@endsection