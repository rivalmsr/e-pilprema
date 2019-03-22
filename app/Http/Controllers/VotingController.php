<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;

Use App\Http\Requests;

Use App\Models\Candidates;
Use App\Models\Votes;
Use App\Models\Users;
Use Session;

Use Cartalyst\Sentinel\Laravel\Facades\Sentinel;



class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidates::all();
        $votes = Votes::all();
        return view('votes.index')->with('list_candidates',$candidates)->with('votes', $votes);
    }

    public function indexDashboard()
    {
        $candidates = Candidates::all();
        $votes = Votes::all();
        return view('dashboard-admin')->with('list_candidates',$candidates)->with('votes', $votes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $users_id = Sentinel::getUser()->id;
        $candidate = Candidates::find($id);  
        $votes = new Votes();    
        $votes->candidates_id = $candidate->id;
        $votes->users_id = $users_id;
        $votes->save();


        $candidates = Candidates::find($id);
        $total_votes = $candidates->vote + 1;
        $candidates->vote = $total_votes;
        $candidates->save();

        $user = Users::find($users_id);
        $user->status = 1;
        $user->save();
        return redirect('logout');
    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_candidate($id)
    {
        $candidate = Candidates::find($id);
        $candidate = Votes::all();
        return view('candidate.show')->with('candidate', $candidate)->with('votes',$candidate);
    }

}
