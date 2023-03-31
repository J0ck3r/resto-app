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
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <p class="ml-2 text-sm font-medium text-gray-900 dark:text-white">{{ $avg_rating }} {{ __('out of') }} 5</p>
          </div>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $count }} {{ __('global ratings') }}</p>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">5 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: 70%"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">70%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">4 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: 17%"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">17%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">3 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: 8%"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">8%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">2 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: 4%"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">4%</span>
                </div>
                <div class="flex items-center mt-4">
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">1 star</span>
                  <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                      <div class="h-5 bg-yellow-400 rounded" style="width: 1%"></div>
                  </div>
                  <span class="text-sm font-medium text-blue-600 dark:text-blue-500">1%</span>
                </div>
            </div> 
          </div>
        </div>
              @foreach ($testimonials as $testimonial)
              <div class="col-sm-3">
                <h4>{{ __('Rating breakdown') }}</h4>
                <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                      <span class="sr-only">80% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">1</div>
                </div>
                <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                      <span class="sr-only">80% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">1</div>
                </div>
                <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                      <span class="sr-only">80% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
                <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                      <span class="sr-only">80% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
                <div class="pull-left">
                  <div class="pull-left" style="width:35px; line-height:1;">
                    <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
                  </div>
                  <div class="pull-left" style="width:180px;">
                    <div class="progress" style="height:9px; margin:8px 0;">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                      <span class="sr-only">80% Complete (danger)</span>
                      </div>
                    </div>
                  </div>
                  <div class="pull-right" style="margin-left:10px;">0</div>
                </div>
              </div>
              @endforeach
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