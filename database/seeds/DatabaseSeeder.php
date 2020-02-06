<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        for ($i=1; $i <= 3; $i++) { 
            TimeLogs::create([
                "emp_id"=> $i
            ]);
            TimeBreak::create([
                "emp_id"=> $i,
            ]);
        }
        // $this->call(UsersTableSeeder::class);
    }
}
