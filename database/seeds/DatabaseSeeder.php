<?php

use App\User;
use App\Task;
use Faker\Factory as Faker;
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

        DB::table('users')->truncate();
        DB::table('tasks')->truncate();
        
        $this->createTasks();
        $this->createUsers();   
        
        
      
        
    }

    private function createUsers()
    {
        DB::table('users')->insert([
            'name' => 'First user',
            'email' => 'example@gmail.com',
            'password' => bcrypt('password'),
                ]);
            DB::table('users')->insert([
           'name' => 'Second user',
            'email' => 'example1@gmail.com',
            'password' => bcrypt('password'),
                ]);
        }

        private function createTasks()
    {
        $faker = Faker::create();
    	foreach (range(1,25) as $index) {
	        DB::table('tasks')->insert([
	            'name' => $faker->sentence,
	            'user_id' => 1,   
	        ]); 
    }

    foreach (range(1,25) as $index) {
        DB::table('tasks')->insert([
            'name' => $faker->sentence,
            'user_id' => 2,   
        ]);
    
}
    }
}