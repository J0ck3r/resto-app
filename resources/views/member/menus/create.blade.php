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
              <h3 class="card-title">{{ __('New Menu') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('member.menus.store') }}" enctype="multipart/form-data">
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
                  <label for="price">{{ __('Price') }}</label>
                  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="{{ __('Enter Price') }}">
                </div>
                @error('price')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <h5>{{ _('Categories') }}</h5>
                <div class="form-group clearfix">
                  @foreach ($categories as $category)
                  <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                    <span></span>
                    {{ $category->name }}
                  </label>
                  <br>
                  @endforeach
                </div>
                @foreach ($restaurants as $restaurant)
                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurant->id }}">
                @endforeach
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