<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
         	[
         		[
            'firstname' => 'nhan',
            'lastname' => 'chu',
            'username' => 'manager',
            'password' => bcrypt('123123'), 
            'level' => '2',  			
            'created_at' => new DateTime(),

        	],
        	[
            'firstname' => 'canh',
            'lastname' => 'bui',
            'username' => 'admin1',
            'level' => '1',  	
            'password' => bcrypt('123123'),   			
            'created_at' => new DateTime(),
        	],

        	 
        	]);
    }
}
