<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Listing\Database\Seeders\ListingDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ListingDatabaseSeeder::class,
            UserDatabaseSeeder::class,
        ]);
    }
}
