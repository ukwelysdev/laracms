<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();

        User::truncate();

        $admin = User::create([
            'name' => 'admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password')
        ]);

        $joe = User::create([
            'name' => 'joe',
            'email'=>'joe@joe.com',
            'password'=>Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $joe->roles()->attach($authorRole);
    }
}
