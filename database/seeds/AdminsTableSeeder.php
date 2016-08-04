<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'username' => 'admin',
            'password' => bcrypt('321'),
            'email' => 'admin@umenhum.com'
        ]);
    }
}
