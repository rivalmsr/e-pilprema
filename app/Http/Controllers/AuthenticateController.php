<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cartalyst\Sentinel\Users\UserInterface;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Cartalyst\Sentinel\Activations\EloquentActivation;

use App\Http\Requests;

use App\Models\Users;

use Activations, Session, Validator, Redirect;

class AuthenticateController extends Controller
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
        $validation = Validator::make($credentials, array(
          'password' => 'required',
          'login' => 'required',
        ));

        if($validation->fails()) {
            return Redirect::back()
            ->withInput()
            ->withErrors($validation->messages())
            ->with('error', 'Pastikan NISN dan password Anda terisi');
        } else {
            Sentinel::check();
            if ($user = Sentinel::authenticate($credentials))
            {
                if(Sentinel::getUser()->status == 1 ) {
                    $users = Users::find(Sentinel::getUser()->id);
                    Sentinel::logout();
                    return redirect('login')->with('error', 'Anda telah melaksanakan pemilihan pada tanggal ' . $users->last_login);
                }elseif(Sentinel::inRole('admin') || Sentinel::inRole('teacher')){
                    return redirect('dashboard');
                }else{
                    return redirect('votes');
                }
            }
            else
            {
                Session::flash('notice', 'Failed to login');
                return redirect('login')->with('error', 'Username Atau Password Salah');
                // Authentication failed.
            }
        }
    }

    public function logout()
    {
        $status = "Terimakasih telah berpartisipasi dalam pemilihan Presiden Mahasiswa |^_^|";
        Sentinel::logout();
        return redirect('/')->with('status', $status);
    }

    public function expired()
    {
        $status = "Waktu Anda habis silahkan kembali login untuk memilih";
        Sentinel::logout();
        return redirect('/')->with('error', $status);
    }
}
