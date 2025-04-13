<?php

namespace Modules\Administrator\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Common\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrator::pages.testimonial.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrator::pages.testimonial.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('administrator::pages.testimonial.edit', ['testimonial' => $testimonial]);
    }
}
