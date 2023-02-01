@extends('layouts.admin')
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
            <form method="POST" action="{{ route('admin.tables.store') }}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="table_number">{{ __('Table Number') }}</label>
                  <input type="number" class="form-control @error('table_number') is-invalid @enderror" id="table_number" name="table_number" placeholder="{{ __('Enter Table Number') }}">
                </div>
                @error('table_number')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="guest_count">{{ __('Guest Count') }}</label>
                  <input type="number" class="form-control @error('guest_count') is-invalid @enderror" id="guest_count" name="guest_count" placeholder="{{ __('Enter Guest Count') }}">
                </div>
                @error('guest_count')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                  <label for="status" class="block">{{ __('Status') }}</label>
                  <select id="status" name="status">
                    @foreach (App\Enums\TableStatus::cases() as $status)
                      <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="location" class="block">{{ __('Location') }}</label>
                  <select id="location" name="location">
                    @foreach (App\Enums\TableLocation::cases() as $location)
                      <option value="{{ $location->value }}">{{ $location->name }}</option>
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