<?php

use App\Models\Mansion;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $mansions = Mansion::whereNotNull('image1')->get();

        foreach ($mansions as $mansion) {
            $path = storage_path('app/uploads/'.$mansion->image1);
            
            $thumbnail_name = uniqid().'.jpg';
            $thumbnail_path = storage_path('app/uploads/img/'.$thumbnail_name);

            $img = Image::read($path);
            $img->cover(1280, 768);
            $img->save($thumbnail_path);

            $mansion->image = 'img/'.$thumbnail_name;
            $mansion->save();
        }

        $posts = Post::whereNotNull('image')->get();

        foreach ($posts as $post) {
            $path = storage_path('app/uploads/'.$post->image);
            
            $thumbnail_name = uniqid().'.jpg';
            $thumbnail_path = storage_path('app/uploads/img/'.$thumbnail_name);

            $img = Image::read($path);
            $img->cover(1280, 768);
            $img->save($thumbnail_path);

            $post->thumbnail = 'img/'.$thumbnail_name;
            $post->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
