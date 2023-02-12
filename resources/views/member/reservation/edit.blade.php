@extends('layouts.auth')
@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('New Table') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('member.reservation.update', $reservation->id) }}">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="first_name">{{ __('First Name') }}</label>
                  <input type="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ $reservation->first_name }}">
                </div>
                @error('first_name')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="last_name">{{ __('Last Name') }}</label>
                  <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ $reservation->last_name }}">
                </div>
                @error('last_name')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="email">{{ __('Email') }}</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $reservation->email }}">
                </div>
                @error('email')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="phone">{{ __('Phone') }}</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $reservation->phone }}">
                </div>
                @error('phone')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="res_date">{{ __('Reservation Date') }}</label>
                  <input type="datetime-local" class="form-control @error('res_date') is-invalid @enderror" id="res_date" name="res_date" value="{{ $reservation->res_date->format('Y-m-d\TH:i:s') }}">
                </div>
                @error('res_date')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="guest_count">{{ __('Guest Count') }}</label>
                  <input type="number" class="form-control @error('guest_count') is-invalid @enderror" id="guest_count" name="guest_count" value="{{ $reservation->guest_count }}">
                </div>
                @error('guest_count')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                  <label for="table_id" class="block">{{ __('Table') }}</label>
                  <select id="table_id" name="table_id">
                    @foreach ($tables as $table)
                      <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->table_number }} ({{ $table->guest_count }} {{ __('Guests') }})</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endsection