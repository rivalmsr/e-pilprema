<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AddAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
            'nisn' => '1111111111',
            'name' => 'admin',
            'gender' => '-',
            'born' => '0000/00/00',
            'address' => '-',
            'type_id' => '1',
            'status' => 0,
            'password' => '1111111111',
        ];
        $user = Sentinel::registerAndActivate($credentials);
        $use = Users::where('nisn', '=', '1111111111')->get();
        $role = Sentinel::findRoleByName('admin');
        $role->users()->attach($use);
    }
}
