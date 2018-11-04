<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "MamujuToday",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'position' => "admin",
            'avatar' => "https://www.gravatar.com/avatar/",
            'role' => "administrator",
            'remember_token' => null,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
