<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Users::create([
            'name' => 'Gedang',
            'email' => 'admin@gedang.id',
            'password' => bcrypt('secret'),
            'status' => true
        ]);
    }
}
