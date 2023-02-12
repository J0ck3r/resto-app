@extends('layouts.auth')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><div class="card-tools float-right">
                  <a class="btn btn-block btn-success btn-sm" href="{{ route('member.restaurants.index') }}" role="button">{{ __('Restaurants') }}</a>
                </div></h3>
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
                <table class="table table-bordered">
                  <thead style="text-align: center">
                    <tr>
                  {{--   <th>{{ __('Categories') }}</th> --}}
                    <th>{{ __('Menus') }}</th>
                    <th>{{ __('Tables') }}</th>
                    <th>{{ __('Reservation') }}</th>
                  {{--   <th style="width: 40px">{{ __('Action') }}</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($restaurants as $restaurant)
                    @if (Auth::user()->id === $restaurant->user_id)
                  <tr>
                  {{--   <td class="vert-align">
                      <div class="flex space-x-2">
                        <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('member.categories.index', $restaurant->restos) }}" role="button">{{ __('View') }}</a>
                    </td></div> --}}
                    <td class="vert-align">
                      <div class="flex space-x-3">
                        <a class="px-4 py-2 bg-green-500 hover:bg-blgreenue-700 rounded-lg text-center text-white" href="{{ route('member.menus.create', $restaurant->id) }}" role="button">{{ __('Add New Menu') }}</a>
                        <td class="vert-align">
                      <div class="flex space-x-3">
                        <a class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-center text-white" href="{{ route('member.tables.create', $restaurant->id) }}" role="button">{{ __('Add New Table') }}</a>
                    <td class="vert-align">
                      <div class="flex space-x-3">
                        <a class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-center text-white" href="{{ route('member.reservation.create', $restaurant->id) }}" role="button">{{ __('Add New Reservation') }}</a></td>
                 {{--   <td class="vert-align">
                      <div class="flex space-x-2">
                        <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('member.restaurants.edit', $restaurant->id) }}" role="button">{{ __('Edit') }}</a>
                      </div>
                  </td> --}} 
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