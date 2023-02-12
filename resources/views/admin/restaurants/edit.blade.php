@extends('layouts.admin')
@section('content')
    <!-- Main content -->
<section class="content">
    <div class="container-fluname">
      <div class="row">
        <!-- left column -->
        <div class="col-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('Edit Restaurant') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('admin.restaurants.update', $restaurant->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $restaurant->name }}">
                </div>
                <div class="form-group">
                  <label for="description">{{ __('Description') }}</label>
                  <textarea class="form-control" id="description" rows="3" name="description">{{  $restaurant->description }}</textarea>
                </div>
                <div class="form-group">
                  <label for="location">{{ __('Location') }}</label>
                  <input type="text" class="form-control" id="location" name="location" value="{{ $restaurant->location }}">
                </div>
                <div class="form-group">
                  <label for="image">{{ __('Image') }}</label>
                    <div class="w-32 h-32">
                      <img src="{{ Storage::url($restaurant->image) }}">
                    </div>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="form-control" id="image" name="image">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
</section>
@endsection