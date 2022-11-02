<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create()->each(function ($user) {
            $user->assignRole('customer_admin');
        });
        User::factory()->count(25)->create()->each(function ($user) {
            $user->assignRole('admin');
        });
        User::factory()->count(50)->create()->each(function ($user) {
            $user->assignRole('customer');
        });
    }
}
