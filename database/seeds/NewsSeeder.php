<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 12; $i++) {
            DB::table('news')->insert([
                'judul' => 'Lorem ipsum dolor sit amet',
                'gambar' => 'default-image.png',
                'isi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'is_active' => 1,
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
