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
    	date_default_timezone_set('America/Caracas');
        DB::table('users')->insert([
        	'name'		=>	'Admin User',
        	'email'		=>	'admin@gmail.com',
        	'password'	=>	bcrypt('123456'),
            'active'    =>  1,
            'role'      =>  'admin', 
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }
}
