<?php

use Illuminate\Database\Seeder;


class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$userId = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'username' => 'username',
            'password' => bcrypt('password'),
        ]);


        $formId = DB::table('forms')->insertGetId([
            'title' => 'دوره همی',
            'description' => 'حضور در این دوره همی اجباری نیست',
            'open_at' => date(),
            'password' => bcrypt('password'),
        ]);
    }
}
