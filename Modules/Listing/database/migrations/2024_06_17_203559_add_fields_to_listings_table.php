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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'headline',
                'beds',
                'baths',
                'area',
                'city',
                'code',
                'street',
                'neighbourhood',
                'description',
                'price',
                'user_id'
            ]);
            $table->dropSoftDeletes();
        });
    }
};
