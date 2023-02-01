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
                  <h3 class="card-title">{{ __('Categories') }}</h3>
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
                  <a class="btn btn-block btn-success btn-sm" href="{{ route('admin.categories.create') }}" role="button">{{ __('New Category') }}</a>
                </div>
              </div>
              <div class="card-body">
                <table id="Categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Image') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    @if (Auth::user()->id === $category->user_id)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><img src="{{ Storage::url($category->image) }}" class="h-16 w-16 rounded"></td>
                    <td>
                      <div class="flex space-x-2">
                        <a class="px-4 py-2 bg-blue-500 hover:bg-blue-700 rounded-lg text-center text-white" href="{{ route('admin.categories.edit', $category->id) }}" role="button">{{ __('Edit') }}</a>
                        <p>
                        <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-center text-white" method="POST" action="{{ route ('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">{{ __('Delete') }}</button>
                      </form>
                  </tr>
                  @endif
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Image') }}</th>
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