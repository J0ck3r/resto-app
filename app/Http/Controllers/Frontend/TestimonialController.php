<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\TestimonialStoreRequest;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    public function create($restaurants)
    {
        return view('testimonials.create', compact('restaurants'));
    }

    public function store(TestimonialStoreRequest $request)
    {
        Testimonial::create([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'comment' => $request->comment,
            'email' => $request->email,
            'rating' => $request->rating
        ]);

        return to_route('restaurants.show', $request->restaurant_id)->with('success', 'Category created successfully');
    }
}
