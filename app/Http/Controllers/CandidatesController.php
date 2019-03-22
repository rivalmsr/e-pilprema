<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CandidatesRequest;
use App\Models\Candidates;
use App\Http\Requests;
use Session, Image, File;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidates::all();
        return view('candidates.index')->with('candidates', $candidates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visi = str_replace("\r\n", "<br>", $request->visi);
        $misi = str_replace("\r\n", "<br>", $request->misi);
        $candidate = new Candidates();
                
        $candidate->name = $request->name;
        $candidate->address = $request->address;
        $candidate->born = $request->born_date;
        $candidate->email = $request->email;
        $candidate->visi = $visi;
        $candidate->misi = $misi;
        $candidate->vote = "0";
        $candidate->save();

        $file = $request->file('image');
        $image_location = public_path().'/uploads/images/' . $candidate->id . '/';
        $direction  = File::makeDirectory($image_location,0777, true, true);
        $image = Image::make($file)->save($image_location . '/' . $candidate->id);
        // $final = $direction . "/";
        $image->save($image_location . '/' . $candidate->id . '.jpg');
        $image->resize(200,100);
        $image->save($image_location . '/' . 'thumb'. $candidate->id . '.jpg');
        $candidate->image = $candidate->id . '.jpg';
        $candidate->save();

        Session::flash('notice', 'Success add candidate');
        $candidates = candidates::all();
        return redirect('candidates')->with('candidates', $candidates);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidate = Candidates::find($id);
        return view('candidates.show')->with('candidate', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidates::find($id);
        return view('candidates.edit')->with('candidate', $candidate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidates = Candidates::find($id);
        if(count($request->image) != 0)
        {

            $image_locations = public_path().'/uploads/images/' . $candidates->id;
            $image_location = public_path().'/uploads/images/' . $candidates->id . '/';
            File::deleteDirectory($image_locations);
            $file = $request->file('image');
            $image = Image::make($file);
            $direction  = File::makeDirectory($image_location,0777, true, true);
            // $final = $direction . "/";
            $image->save($image_location . $candidates->id . '.jpg');
            $image->resize(200,100);
            $image->save($image_location . 'thumb'. $candidates->id . '.jpg');
            $candidates->image = $candidates->id . '.jpg';
        }
        $candidates->name = $request->name;
        $candidates->address = $request->address;
        $candidates->born = $request->born_date;
        $candidates->email = $request->email;
        $candidates->visi = $request->visi;
        $candidates->misi = $request->misi;
        // $request->file('image')->move($uploadDestinationPath, $new_file_name);
        $candidates->update();
        Session::flash('notice', 'Success update candidate');
        return Redirect('candidates');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidates = Candidates::all();
        $candidate = Candidates::find($id);
        $image_locations = public_path().'/uploads/images/' . $candidate->id;
        File::deleteDirectory($image_locations);
            if ($candidate->delete()) {
              Session::flash('notice', 'Candidate success delete');
              return Redirect('candidates')->with('candidates', $candidates);
            } else {
              Session::flash('error', 'Candidate fails delete');
              return Redirect('candidates');
            }
    }
}
