<?php

use Illuminate\Database\Seeder;

class SinhvienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sinhvien')->insert(
         	[
					[
					'name' => str_random(10),
					'email' => str_random(10).'@gmail.com',
					'age' => 26,
					'phone' => '123456789',
					'created_at' => new DateTime()
					],
						[
					'name' => str_random(10),
					'email' => str_random(10).'@gmail.com',
					'age' => 25,
					'phone' => '123456789',
					'created_at' => new DateTime()
					],
						[
					'name' => str_random(10),
					'email' => str_random(10).'@gmail.com',
					'age' => 24,
					'phone' => '123456789',
					'created_at' => new DateTime()
					],
						[
					'name' => str_random(10),
					'email' => str_random(10).'@gmail.com',
					'age' => 23,
					'phone' => '123456789',
					'created_at' => new DateTime()
					],
						[
					'name' => str_random(10),
					'email' => str_random(10).'@gmail.com',
					'age' => 22,
					'phone' => '123456789',
					'created_at' => new DateTime()
					]
         	]);
    }
}
