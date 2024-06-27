<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Entities\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'zeez',
            'email' => 'zzz@example.com',
        ]);

        User::factory()->create([
            'name' => 'zeezo',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);
    }
}
