@extends('layouts.guest')
@section('content')
<div class="container w-full px-5 py-6 mx-auto">
    <div class="flex items-center min-h-screen bg-gray-50">
        <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img class="object-cover w-full h-full"
                        src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="img" />
                </div>
                <div class="flex items-center justify-center p-8 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h3 class="mb-4 text-xl font-bold text-blue-600">{{ __('Write Your Testimonial') }}</h3>

                        <div class="w-full bg-gray-200 rounded-full">
                            <div
                                class="w-100 p-1 text-xs font-medium leading-none text-center text-blue-100 bg-blue-600 rounded-full">{{ __('Write us Your Comment') }}</div>
                        </div>
                        <div class="p-3">
                        </div>
                        <form method="POST" action="{{ route('testimonials.store', $restaurants) }}">
                            @csrf
                            <p>
                            <div class="flex items-center mb-5 sm:col-span-6">
                                <div class="rate">
                                    <input type="radio" id="5" class="rate" name="rating" value="5"/>
                                    <label for="5">5 stars</label>
                                    <input type="radio" id="4" class="rate" name="rating" value="4"/>
                                    <label for="4">4 stars</label>
                                    <input type="radio" id="3" class="rate" name="rating" value="3"/>
                                    <label for="3">3 stars</label>
                                    <input type="radio" id="2" class="rate" name="rating" value="2">
                                    <label for="2">2 stars</label>
                                    <input type="radio" id="1" class="rate" name="rating" value="1"/>
                                    <label for="1">1 star</label>
                                 </div>
                            </div>
                            @error('rating')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name')}}
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title')}}
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="title" name="title" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('title')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="comment" class="block text-sm font-medium text-gray-700">{{ __('Comment')}}
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="comment" name="comment" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('comment')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="sm:col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                <div class="mt-1">
                                    <input type="email" id="email" name="email" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('email')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{ $restaurants }}">
                            <div class="mt-6 p-4 flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">{{ __('Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection