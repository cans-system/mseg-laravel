<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mansions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('access');
            $table->integer('total_units');
            $table->date('birthday');
            $table->integer('birthday_set');
            $table->string('floors');
            $table->string('architecture');
            $table->text('note')->nullable();
            $table->string('image_path')->nullable(); // Google Driveからのインポートに使用したカラム（未使用）
            $table->float('unit_price');
            $table->text('comment')->nullable();
            $table->integer('private');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mansions');
    }
};
