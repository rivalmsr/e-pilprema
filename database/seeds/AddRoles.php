<?php

use Illuminate\Database\Seeder;

use App\Models\Roles;

class AddRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = new Roles;
        $insert->name = "admin";
        $insert->slug = "admin";
        $insert->save();

        $insert = new Roles;
        $insert->name = "teacher";
        $insert->slug = "teacher";
        $insert->save();

        $insert = new Roles;
        $insert->name = "user";
        $insert->slug = "user";
        $insert->save();
    }
}
