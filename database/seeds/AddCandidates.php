<?php

use Illuminate\Database\Seeder;

use App\Models\Candidates;

class AddCandidates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = new Candidates;
        $insert->name = 'Candidate One';
        $insert->address = 'Lorem ipsum';
        $insert->born = '0000/00/00';
        $insert->email = 'example.w@examp.com';
        $insert->visi = 'Lorem';
        $insert->misi = 'lorem';
        $insert->image = '1.jpg';
        $insert->vote = 0;
        $insert->save();

        $insert = new Candidates;
        $insert->name = 'Candidate Two';
        $insert->address = 'Lorem ipsum';
        $insert->born = '0000/00/00';
        $insert->email = 'example.q@examp.com';
        $insert->visi = 'Lorem';
        $insert->misi = 'lorem';
        $insert->image = '2.jpg';
        $insert->vote = 0;
        $insert->save();

        $insert = new Candidates;
        $insert->name = 'Candidate Three';
        $insert->address = 'Lorem ipsum';
        $insert->born = '0000/00/00';
        $insert->email = 'example.2@examp.com';
        $insert->visi = 'Lorem';
        $insert->misi = 'lorem';
        $insert->image = '3.jpg';
        $insert->vote = 0;
        $insert->save();
    }
}
