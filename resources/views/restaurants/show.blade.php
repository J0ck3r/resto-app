@extends('layouts.guest')
@section('content')
<div class="container w-full px-5 py-6 mx-auto">
    <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach ($menus as $menu)
    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
      <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
      <div class="px-6 py-4">
        @foreach ($menu->categories as $category)
        <div class="flex mb-2">
            <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{ $category->name }}</span>
          </div>
          @endforeach
        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $menu->name }}</h4>
        <p class="leading-normal text-gray-700">{{$menu->description}}</p>
      </div>
      <div class="flex items-center justify-between p-4">
        <span class="text-xl text-green-600">{{ $menu->price }}</span>
      </div>
    </div>
    @endforeach
  </div>
</div>
  <section class="pt-1 pb-8 bg-gray-800">
    <div class="flex items-center justify-between p-4">
      <a class="text-xl text-green-600 btn btn-block btn-success btn-sm" href="{{ route('testimonials.create', $restaurants) }}" role="button">{{ __('Make a Testimonial') }}</a>
    </div>
    <div class="my-3 text-center">
      <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
        {{ __(('Testimonial')) }} </h2>
      </div>
      @foreach ($testimonials as $testimonial)
    <div class="grid gap-4 lg:grid-cols-1">
      <div class="p-4 bg-white rounded-lg shadow-lg">
        <div>
          <p class="text-gray-600">{{ $testimonial->rating }}/5</p>
        </div>
        <div>
          <p class="text-gray-600">{{ $testimonial->comment }}</p>
        </div>
        <div class="flex justify-end">
          <span class="text-xl font-medium text-green-500">{{ $testimonial->name }}</span>
        </div>
      </div>
    </div>
    <br>
    @endforeach
    </section>
@endsection