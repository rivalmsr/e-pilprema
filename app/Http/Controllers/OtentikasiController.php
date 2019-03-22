<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Cartalyst\Sentinel\Activations\EloquentActivation;

use App\Http\Requests;

use App\Models\Users;

use Activations, Session;

class OtentikasiController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {

        $credentials = [
            'login'    => $request->nisn,
            'password' => $request->password,
        ];
        Sentinel::check();
        if ($user = Sentinel::authenticate($credentials))
        {
            if(Sentinel::getUser()->status == 1 ) {
-                Sentinel::logout();
-                return redirect('/');
-            }elseif(Sentinel::inRole('admin') || Sentinel::inRole('teacher')){
-                return redirect('dashboard');
-            }else{
-                return redirect('votes');
-            }
        }
        else
        {
            Session::flash('notice', 'Failed to login');
            return redirect('login');
            // Authentication failed.
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
