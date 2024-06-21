<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Mansion;
use Illuminate\Http\Request;

class AdminImageController extends Controller
{
    function store (Request $request, Mansion $mansion) {
        $uploadFiles = $request->file('images');

        $images = collect();
        foreach ($uploadFiles as $uploadFile) {
            $image = new Image();
            $image->image = $uploadFile->store('img');
            $images->push($image);
        }
        $mansion->images()->saveMany($images);

        return back();
    }

    public function destroy (Image $image) {
        $image->delete();

        return back();
    }
}
