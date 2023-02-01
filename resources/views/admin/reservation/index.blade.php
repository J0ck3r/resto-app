@extends('layouts.admin')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('Reservation') }}</h3>
                <div class="float-right input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                </div>
              </div>
              <div class="card-tools float-right">
                <a class="btn btn-block btn-success btn-sm" href="{{ route('admin.reservation.create') }}" role="button">{{ __('New Reservation') }}</a>
              </div>
              </div>
              <div class="card-body">
                <table id="Reservation" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Reservation Time') }}</th>
                    <th>{{ __('Table Number') }}</th>
                    <th>{{ __('Guest Count') }}</th>
                  </tr>
                  </thead>
                  @foreach ($reservations as $reservation)
                  @if (Auth::user()->id === $reservation->table->user_id)
                  <tbody>
                  <tr>
                    <td>{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->phone }}</td>
                    <td>{{ $reservation->res_date->format('d.m.Y') }}</td>
                    <td>{{ $reservation->table->table_number }}</td>
                    <td>{{ $reservation->guest_count }}</td>
                    <td><div class="flex space-x-2">
                      <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('admin.reservation.edit', $reservation->id) }}" role="button">{{ __('Edit') }}</a>
                      <p>
                      <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-center text-white" method="POST" action="{{ route ('admin.reservation.destroy', $reservation->id) }}" onsubmit="return confirm('{{ __('Are you sure?') }}');">
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
                  <tfoot>
                  <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Reservation Time') }}</th>
                    <th>{{ __('Table Number') }}</th>
                    <th>{{ __('Guest Count') }}</th>
                    <td>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
@endsection