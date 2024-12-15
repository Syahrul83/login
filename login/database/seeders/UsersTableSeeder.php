<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$5s5AcoHbpMUhKQnUoLGb6efv6azkYKkd6t6ND141S4NtsoUWhoAwC',
                'remember_token' => NULL,
                'created_at' => '2024-12-15 07:00:59',
                'updated_at' => '2024-12-15 07:00:59',
            ),
        ));
        
        
    }
}