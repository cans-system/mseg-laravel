<?php

use App\Models\Image;
use App\Models\Mansion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $mansions = Mansion::all();
        foreach ($mansions as $mansion) {
            $images = collect();
            if ($mansion->image1) {
                $image1 = new Image();
                $image1->image = $mansion->image1;
                $images->push($image1);
            }
            if ($mansion->image2) {
                $image2 = new Image();
                $image2->image = $mansion->image2;
                $images->push($image2);
            }
            if ($mansion->image3) {
                $image3 = new Image();
                $image3->image = $mansion->image3;
                $images->push($image3);
            }
            if ($mansion->image4) {
                $image4 = new Image();
                $image4->image = $mansion->image4;
                $images->push($image4);
            }
            $mansion->images()->saveMany($images);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Image::truncate();
    }
};
