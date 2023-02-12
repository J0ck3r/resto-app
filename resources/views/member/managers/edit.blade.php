@extends('layouts.auth')
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
              <h3 class="card-title">{{ __('Edit Manager') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('member.managers.update', $manager->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="name">{{ __('Name') }}</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $manager->name }}">
                </div>
                @error('name')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="description">{{ __('Description') }}</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{  $manager->description }}</textarea>
                </div>
                @error('description')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="price">{{ __('Price') }}</label>
                  <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $manager->price }}">
                </div>
                @error('price')
                  <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <div class="form-group">
                  <label for="restaurants" class="block">{{ __('restaurants') }}</label>
                  <select id="restaurants" name="restaurants[]" multiple>
                    @foreach ($restaurants as $restaurant)
                      <option value="{{ $restaurant->id }}" @selected($manager->restaurants->contains($category))>{{ $restaurant->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="image">{{ __('Image') }}</label>
                    <div class="w-32 h-32">
                      <img src="{{ Storage::url($manager->image) }}">
                    </div>
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