<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SAdmin = User::create([
            'name' => 'SAdmin',
            'email' => 'sadmin@system.com',
            'password' => bcrypt('rahasia'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'roles_id' => 1,
        ]);

        $SAdmin->assignRole('SAdmin');

        $Pemdes = User::create([
            'name' => 'Pemdes',
            'email' => 'pemdes@system.com',
            'password' => bcrypt('rahasia'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'roles_id' => 2,
        ]);

        $Pemdes->assignRole('Pemdes');

        $Bumdes = User::create([
            'name' => 'Bumdes',
            'email' => 'bumdes@system.com',
            'password' => bcrypt('rahasia'),
            'remember_token' => Str::random(10),
            'is_active' => true,
            'roles_id' => 3,
        ]);

        $Bumdes->assignRole('Bumdes');
    }
}
