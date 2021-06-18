<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
    public function index() {
        $zeroIndexImages = Image::all()->where('index', 0);

        //if $zeroIndexImages is an empty array, the base image won't be set. So, send an empty array to indicate the user.
        if(!count($zeroIndexImages)) {
            return response()->json($zeroIndexImages);
        }

        //generate 2d array
        $imagesArr = $this->getImagesArr();

        return response()->json($imagesArr, 200);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'arrayIndex' => 'required',
            'imageFile' => 'required|image|max:2000'
        ]);

        //get file extension and set fileName
        $extension = $request->file('imageFile')->getClientOriginalExtension();
        $fileName = "$request->arrayIndex" . "_" . time() . ".$extension";

        //store an image to /public/images folder
        $request->file('imageFile')->storeAs('/public/images', $fileName);

        //create new image post
        $image = Image::create([
            'name' => $fileName,
            'index' => $request->arrayIndex
        ]);

        //generate 2d array
        $imagesArr = $this->getImagesArr();

        return response()->json($imagesArr, 201);
    }

    function getImagesArr() {
        $zeroIndexImages = Image::all()->where('index', 0);
        $oneIndexImages = Image::all()->where('index', 1);
        $twoIndexImages = Image::all()->where('index', 2);
        $threeIndexImages = Image::all()->where('index', 3);

        $imagesArr = [];

        for($i = 1; $i <= 6; $i++) {
            $imageArr = [];

            if(count($zeroIndexImages)) {
                $randomZeroIndexImage = $zeroIndexImages->random();
                array_push($imageArr, $randomZeroIndexImage);
            }

            if(count($oneIndexImages)) {
                $randomOneIndexImage = $oneIndexImages->random();
                array_push($imageArr, $randomOneIndexImage);
            }

            if(count($twoIndexImages)) {
                $randomTwoIndexImage = $twoIndexImages->random();
                array_push($imageArr, $randomTwoIndexImage);
            }

            if(count($threeIndexImages)) {
                $randomThreeIndexImage = $threeIndexImages->random();
                array_push($imageArr, $randomThreeIndexImage);
            }
            
            array_push($imagesArr, $imageArr);
        };

        return $imagesArr;
    }
}
