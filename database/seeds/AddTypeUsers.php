<?php

use Illuminate\Database\Seeder;
use App\Models\TypeUsers;

class AddTypeUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = New TypeUsers;
        $insert->name = 'Admin';
        $insert->save();

        $insert = New TypeUsers;
        $insert->name = 'Teacher';
        $insert->save();

        $insert = New TypeUsers;
        $insert->name = 'User';
        $insert->save();
    }
}
