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
        Schema::table('listings', function (Blueprint $table) {
            $table->tinyText('headline');

            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('area');

            $table->tinyText('city');
            $table->tinyText('code');
            $table->tinyText('street');
            $table->tinyText('neighbourhood');

            $table->longText('description');
            $table->unsignedInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* Schema::table('listings', function (Blueprint $table) {
            
        }); */
        Schema::dropColumns('listings',[
            'beds', 'baths', 'area', 'city', 'code', 'street', 'neighbourhood', 'price'
        ]);
    }
};
