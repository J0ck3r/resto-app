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
              <h3 class="card-title">{{ __('New Restaurant') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('member.restaurants.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Enter Name') }}">
                </div>
                @error('name')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="description">{{ __('Description') }}</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description" placeholder="{{ __('Enter Description') }}"></textarea>
                </div>
                @error('description')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="location">{{ __('Location') }}</label>
                  <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" placeholder="{{ __('Enter Location') }}">
                </div>
                @error('location')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="image">{{ __('Image') }}</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    </div>
                  </div>
                </div>
                @error('image')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="open_time">{{ __('Open Time') }}</label>
                <input type="datetime-local" class="form-control @error('open_time') is-invalid @enderror" id="open_time" name="open_time">
              </div>
              @error('open_time')
                <div class="text-sm text-red-400">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label for="close_time">{{ __('Close Time') }}</label>
                <input type="datetime-local" class="form-control @error('close_time') is-invalid @enderror" id="close_time" name="close_time">
              </div>
              @error('close_time')
                <div class="text-sm text-red-400">{{ $message }}</div>
              @enderror              
              <input type="hidden" name="user_id" id="user_id" value="{{ Auth::User()->id }}">
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