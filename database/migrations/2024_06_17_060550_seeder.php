<?php

use App\Models\Mansion;
use App\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(Storage::disk('local')->get(env('SEEDER_SQL')));

        DB::update('update mansions set image1=null where image1=""');
        DB::update('update mansions set image2=null where image2=""');
        DB::update('update mansions set image3=null where image3=""');
        DB::update('update mansions set image4=null where image4=""');

        DB::update('update mansions set image1=concat("img/", image1) where image1 is not null');
        DB::update('update mansions set image2=concat("img/", image2) where image2 is not null');
        DB::update('update mansions set image3=concat("img/", image3) where image3 is not null');
        DB::update('update mansions set image4=concat("img/", image4) where image4 is not null');

        DB::update('update posts set image=null where image=""');

        DB::update('update posts set image=concat("img/", image) where image is not null');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Mansion::truncate();
        Post::truncate();
    }
};
