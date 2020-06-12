<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'uuid' => Str::random(36),
            'NIP' => '1234567890123',
            'nama' => 'admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        // $this->call(UserSeeder::class);
    }
}
