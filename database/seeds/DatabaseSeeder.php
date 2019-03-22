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
        $this->call(AddTypeUsers::class);
        $this->call(AddRoles::class);
	$this->call(AddAdmin::class);
	$this->call(AddCandidates::class);
    }
}
