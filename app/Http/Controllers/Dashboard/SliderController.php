<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
    public function index()
    {
        $title      = 'Image Slider';
        $sliders    = Slider::all();

        return view('dashboard.slider', compact('title', 'sliders'));
    }

    public function store(Request $request)
    {
        // try {
        App::setlocale("id");

        $validation = $request->validate([
            'img_name'  => 'required|image|max:2048'
        ],
        [
            'required'  => 'Anda belum mengunggah gambar!',
            'image'     => 'File harus dalam format gambar!',
            'max'       => 'Ukuran gambar maksimal :max KB'
        ]);

        if($request->hasFile('img_name')) {
            $validation['img_name'] = $request->file('img_name')->store('slider-images');
        }

        Slider::create($validation);

        notify()->success('Gambar Berhasil Ditambahkan', 'Success!');
        return redirect()->route('image.slider');

        // } catch (ValidationException $exception) {
        //     $message = $exception->validator->getMessageBag();
        //     $message->get("img_name");
        //     $message = $exception->validator->errors();
        //     $message->toJson(JSON_PRETTY_PRINT);
            
        //     notify()->error($message, 'Error');
        //     return redirect()->route('image.slider');
        // }
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::where('id', $id)->first();
        
        $validation = $request->validate([
            'img_name'  => 'required|image|max:1024'
        ]);
        
        if($request->has('img_name')) {
            $validation['img_name'] = $request->file('img_name')->store('slider-images');
        }
        unlink('storage/'.$slider->img_name);
        
        $slider->update($validation);

        notify()->success('Gambar Berhasil Diubah', 'Success!');
        return redirect()->route('image.slider');

    }

    public function destroy($id)
    {
        $slider = Slider::where('id', $id)->first();

        unlink('storage/' . $slider->img_name);

        $slider->delete();

        notify()->success('Gambar Berhasil Dihapus', 'Success!');
        return redirect()->route('image.slider');
    }
}
