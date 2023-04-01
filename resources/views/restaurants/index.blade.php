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
        <svg class="hidden">
          <symbol id="star" width="32" height="30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.77 11.857H19.74L15.99.5l-3.782 11.357H0l9.885 6.903-3.692 11.21 9.736-7.05 9.796 6.962-3.722-11.18 9.766-6.845z" fill="currentColor"/></symbol>
        </svg>
        <div class="relative inline-block mt-8">
          <div class="text-gray-200 inline-flex space-x-1">
            <svg viewBox="0 0 32 30" class="w-8 h-8">
                <use xlink:href="#star"></use>
            </svg>
            <svg viewBox="0 0 32 30" class="w-8 h-8">
                <use xlink:href="#star"></use>
            </svg>
            <svg viewBox="0 0 32 30" class="w-8 h-8">  
                <use xlink:href="#star"></use>
            </svg>    
            <svg viewBox="0 0 32 30" class="w-8 h-8">
                <use xlink:href="#star"></use>
            </svg>    
            <svg viewBox="0 0 32 30" class="w-8 h-8">
                <use xlink:href="#star"></use>
            </svg>    
          </div>
          <div class="overflow-hidden absolute left-0 top-0 text-yellow-400 flex space-x-1" style="width: {{ $restaurant->total_ratings ? $restaurant->rating . '%' : '0%' }}">
            <svg viewBox="0 0 32 30" class="w-8 h-8 flex-shrink-0">
                <use xlink:href="#star"></use>
            </svg>
            <svg viewBox="0 0 32 30" class="w-8 h-8 flex-shrink-0	">
                <use xlink:href="#star"></use>
            </svg>
            <svg viewBox="0 0 32 30" class="w-8 h-8 flex-shrink-0	">  
                <use xlink:href="#star"></use>
            </svg>    
            <svg viewBox="0 0 32 30" class="w-8 h-8 flex-shrink-0	">
                <use xlink:href="#star"></use>
            </svg>    
            <svg viewBox="0 0 32 30" class="w-8 h-8 flex-shrink-0	">
                <use xlink:href="#star"></use>
            </svg>
          </div>   
        </div>
      </div>
      <div class="flex items-center justify-between p-4">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $restaurant->total_ratings }} {{ __('global ratings') }}</p>
       </div>
      <div class="flex items-center justify-between p-4">
        <span class="text-xl text-green-600">{{ $restaurant->location }}</span>
      </div>
    </a>
    @endforeach
    </div>
  </div>
@endsection