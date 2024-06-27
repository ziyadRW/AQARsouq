<?php

namespace Modules\Listing\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Listing\Entities\Listing;

class ListingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Listing::factory(6)->create([
            'user_id' => 1
        ]);

        Listing::factory(6)->create([
            'user_id' => 2
        ]);
    }
}
