<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        $user = User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $profile = Profile::create([
            'name' => 'Super Admin',
            'age' => 20,
            'gender' => 'male',
            'task_category' => 'mental',
            'task_intensity' => 'moderate',
            'avatar' => '/uploads/profile/user-default.png',
            'user_id' =>  $user->id,
        ]);
    }
}
