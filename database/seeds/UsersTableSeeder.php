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
        App\User::create([
            'name' => 'admin',
            'avatar' => asset('uploads/avatars/default.png'),
            'email' => 'admin@app.test',
            'password' => bcrypt('admin'),
            'admin' => 1
        ]);
    }
}
