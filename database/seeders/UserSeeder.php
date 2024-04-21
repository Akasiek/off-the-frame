<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run(): void
    {
        // Create admin user
        if (!env('ADMIN_EMAIL') || !env('ADMIN_PASSWORD')) {
            throw new Exception('Please set ADMIN_EMAIL and ADMIN_PASSWORD in your .env file');
        }

        User::updateOrCreate(['name' => 'Admin'], [
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
    }
}
