<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        // Add calls to Seeders here
        #$this->call('UsersTableSeeder');
        #$this->call('RolesTableSeeder');
        #$this->call('PermissionsTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('ActorsTableSeeder');
        $this->call('GenresTableSeeder');
        $this->call('MoviesTableSeeder');
	}

}