@extends('layouts.guest')
@section('content')
  <div class="container w-full px-5 py-6 mx-auto">
    <div class="grid md:grid-cols-4 gap-y-6">
      @foreach ($menus as $menu)
        <a class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg" href="{{ route('reservations.step.one', $restaurants) }}">
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
          <span class="text-xl text-green-600">{{ $menu->price }} {{ __('$') }}</span>
        </div>
        </a>
        @endforeach
    </div>
  </div>
  <section>
          <a href="{{ route('testimonials.create', $restaurants) }}" role="button" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
              {{ __('Make a review') }}
            </span>
          </a>
          <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid md:grid-cols-4 gap-y-6">
              <div class="height-100 container d-flex justify-content-center align-items-center">
                <div class="flex items-center mb-3">
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
                    <div class="overflow-hidden absolute left-0 top-0 text-yellow-400 flex space-x-1" style="width: {{ $percent }}%;">
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
                  <div class="flex items-center mt-7">
                   <p class="ml-5 text-sm font-medium text-gray-900 dark:text-white">{{ $avg_rating }} {{ __('out of') }} 5</p>
                  </div> 
                </div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $count }} {{ __('global ratings') }}</p>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">5 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: {{ $five_star_percent }}%;"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ $five_star_percent }}%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">4 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: {{ $four_star_percent }}%;"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ $four_star_percent }}%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">3 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: {{ $three_star_percent }}%;"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ $three_star_percent }}%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">2 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: {{ $two_star_percent }}%;"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ $two_star_percent }}%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">1 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: {{ $one_star_percent }}%;"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">{{ $one_star_percent }}%</span>
                </div>
              </div>          
                <article>
                  @foreach ($testimonials as $testimonial)
                  <div class="flex items-center mb-4 space-x-4">
                      <div class="space-y-1 font-medium dark:text-white">
                          <p>{{ $testimonial->name }} <time datetime="{{ $testimonial->created_at->format('j F Y') }}" class="block text-sm text-gray-500 dark:text-gray-400"></time></p>
                      </div>
                  </div>
                  <div class="flex items-center mb-1">
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
                      <div class="overflow-hidden absolute left-0 top-0 text-yellow-400 flex space-x-1" style="width: {{ $testimonial->rating * 20 }}%;">
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
                      <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">{{ $testimonial->title }}</h3>
                  </div>
                  <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>{{ __('Reviewed in the United Kingdom on') }} <time datetime="{{ $testimonial->created_at->format('j F Y') }}">{{ $testimonial->created_at->format('j F Y') }}</time></p></footer>
                  <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $testimonial->comment }}</p>
                  <a href="#" class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('Read more') }}</a>
                  <aside>
                      <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 {{ __('people found this helpful') }}</p>
                      <div class="flex items-center mt-3 space-x-3 divide-x divide-gray-200 dark:divide-gray-600">
                          <a href="#" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">{{ __('Helpful') }}</a>
                          <a href="#" class="pl-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">{{ __('Report abuse') }}</a>
                      </div>
                  </aside>
                  @endforeach
                </article>
            </div>
          </div>
              @foreach ($testimonials as $testimonial)
            <div class="row">
              <div class="col-sm-7">
                <hr>
                <div class="review-block">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="review-block-name">{{ $testimonial->name }}</div>
                      <div class="review-block-date">{{ $testimonial->created_at->format('j F Y') }}</div>
                    </div>
                    <div class="col-sm-9">
                      <div class="review-block-rate">
                        <span class="btn btn-warning btn-xs" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </span>
                        <span class="btn btn-warning btn-xs" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </span>
                        <span class="btn btn-warning btn-xs" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </span>
                        <span class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </span>
                        <span class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                        </span>
                      </div>
                      <div class="review-block-title">{{ $testimonial->title }}</div>
                      <div class="review-block-description">{{ $testimonial->comment }}</div>
                    </div>
                  </div>
                  <hr/>
                </div>
              </div>
            </div>
            @endforeach
          </div>
</section>
@endsection