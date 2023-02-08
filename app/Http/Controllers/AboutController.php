<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function edit(About $about)
    {
        return view('backend.edit', [
            'title' => 'Edit About',
            'about' => $about
        ]);
    }

    public function show (About $about) {
        return view('backend.show',[
            'title' => 'Show',
            'about' => $about
        ]);
    }

    public function update(Request $request, About $about)
    {
        $validatedData = $request->validate([
            'about'     => 'required',
            'company'   => 'required',
            'visi'      => 'required',
            'misi'      => 'required'
        ]);

        About::where('id', $about->id)->update($validatedData);

        return redirect('/dashboard')->with('success', 'About has been updated');

    }
}
