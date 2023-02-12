@extends('layouts.guest')
@section('content')
<div class="container w-full px-5 py-6 mx-auto">
    <div class="grid lg:grid-cols-4 gap-y-6">
        @foreach ($restaurants as $restaurant)
    <a href="{{ route('restaurants.show', $restaurant->id) }}" class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
      <img class="w-full h-48" src="{{ Storage::url($restaurant->image) }}" alt="Image" />
      <div class="px-6 py-4">
        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $restaurant->name }}</h4>
        <p class="leading-normal text-gray-700">{{$restaurant->description}}</p>
      </div>
      <div class="flex items-center justify-between p-4">
        <span class="text-xl text-green-600">{{ $restaurant->location }}</span>
      </div>
    </a>
    @endforeach
    </div>
  </div>
@endsection