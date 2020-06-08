<?php

use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'name' => 'David Rey',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        Setting::setSetting('profile_complete', 0);
    }
}
