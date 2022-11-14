<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index () {
        return view ('backend.slider', [
            'title' => 'Slider | Dashboard',
            'sliders' => Slider::all()
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'slider' => 'image|file|max:2048'
        ]);

        if($request->file('slider')) {
            $validatedData['slider'] = $request->file('slider')->store('slider-images');
        }
        // return $request;

        Slider::create($validatedData);
        return redirect('/dashboard/slider')->with('success', 'New Image slider has been added');
    }

    public function destroy (Slider $slider) {
        if($slider->slider){
            Storage::delete($slider->slider);
        }

        Slider::destroy($slider->id);
        return redirect('/dashboard/slider')->with('delete', 'Image slider has been deleted');
    }
}
