<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

use App\Models\Candidates;

use App\Http\Requests;

use App\Models\TypeUsers;

use App\Models\Votes;

use App\Http\Requests\UsersRequest;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Activation, Validator, Redirect, Mail, Session, Hash;



class UsersController extends Controller
{
    /**
     *Return view to index
     */
    public function index()
    {
        $users = Users::where('type_id','=','3')->paginate(15);
        $user = Users::where('type_id', '=', '3')->get();
        return view('users.index')->with('users', $users)->with('user_s', $user);
    }

    public function indexPengawas()
    {
        $users = Users::where('type_id','!=','3')->paginate(15);
        $user = Users::where('type_id', '!=', '3')->get();
        return view('teachers.index')->with('users', $users)->with('user_s', $user);
    }

    /**
     *Return view to form create user
     */
    public function create()
    {
        $type = TypeUsers::all();
        return view('users.create')
            ->with('type', $type);
    }

    /**
     * Procces save data users
     */
    public function store(UsersRequest $request)
    {
        $credentials = [
            'nisn' => $request->nisn,
            'name' => $request->name,
            'gender' => $request->gender,
            'born' => $request->born_date,
            'address' => $request->address,
            'type_id' => $request->type,
            'status' => 0,
            'password' => $request->nisn,
        ];
        $user = Sentinel::registerAndActivate($credentials);
        $use = Users::where('nisn', '=', $request->nisn)->get();
        if ($request->type == "1") {
            $role = Sentinel::findRoleByName('admin');
            $role->users()->attach($use);
            $use->status = "2";
            $use->update();
        }elseif ($request->type == "2") {
            $role = Sentinel::findRoleByName('teacher');
            $role->users()->attach($use);
            $use->status = "2";
            $use->update();
        }else{
            $role = Sentinel::findRoleByName('user');
            $role->users()->attach($use);
        }
        Session::flash('message',$request->nisn.' your photo success to post');
        return redirect('users');
    }

    /**
     * Return view for detail user
     */
    public function show($id)
    {
        $users = Users::find($id);
        return view('users.show')->with('list_users',$users);
    }


    /**
     * Return view to form edit user
     */
    public function edit($id)
    {
        $users = Users::find($id);
        return view('users.edit')->with('list_users',$users);
    }

    /**
     * Procces update after edit data user
     */
    public function update(Request $request, $id)
    {
        $users = Users::find($id);
        $users->nisn = $request->nisn;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->born = $request->born_date;
        $users->address = $request->address;
        
        $users->save();

        Session::flash('message',$request->name.' your photo success to update');
        return redirect('users');
    }

    /**
     * Procces for delete user
     */
    public function destroy($id)
    {
        $users = Users::find($id);
        $users->delete();
        $user = Users::all();
        Session::flash('message',$users->name.' your photo success to delete');
        return back()->with('users', $user);
    }

    // ------------------Aktivasi Tjoy-----------------------

    public function activeall()
    {
        ini_set('max_execution_time', 600);
        $users = Users::all();
        foreach ($users as $key) {
            $user = Sentinel::findById($key->id);
            $activation = Activation::create($user);
            $use = Users::find($key->id)->activation;
            $use['completed'] = '1';
            $use->save();
        }
        return redirect('users')
            ->with('users', $users);
    }

    public function active($id)
    {
        $users = Users::all();
        $user = Sentinel::findById($id);
        $activation = Activation::create($user);
        $use = Users::find($id)->activation;
        $use['completed'] = '1';
        $use->save();
        return redirect('users')
            ->with('users', $users);
    }

    public function deactive($id)
    {
        $users = Users::all();
        $user = Sentinel::findById($id);
        $activation = Activation::remove($user);
        return redirect('users')
            ->with('users', $users);
    }

    public function home ()
    {
        $candidates = Candidates::all();
        $candidate = Votes::all();

        return view('welcome')
        ->with('list_candidates',$candidates)
        ->with('votes',$candidate);
    }

    public function quick_count(Request $request)
    {
        if($request->ajax()) {
            $data['list_candidates'] = Candidates::all();
            $data['votes'] = Votes::all();
            $data['usersVotes'] = Users::where('status', '=', '1')->get();
            $data['sumUsers'] = Users::whereTypeId(3)->get();
            $view = (String) view('list-candidates', $data)
                ->render();
            return response()->json(['view' => $view]);
        }
        $data['list_candidates'] = Candidates::all();
        $data['votes'] = Votes::all();
        $data['usersVotes'] = Users::where('status', '=', '1')->get();
        $data['sumUsers'] = Users::whereTypeId(3)->get();
        return view('quick_count', $data);
    }

    public function show_candidate($id)
    {
        $candidate = Candidates::find($id);
        return view('candidate.show')
        ->with('candidate', $candidate)
        ->with('votes',$vote);

    }

    public function getdata()
    {
        return Datatables::of(Users::all())
        ->addColumn('activation', function($user){
            $activation = Users::find($user->id)->activation;
            if ($activation['completed']== 1) {
                echo "<a href='users/active/" . $user->id;
            }
        })
        ->editColumn('month', '
            {!! $month !!}
            ')
        ->editColumn('description', '
            {!! $description !!}
            ')
        ->editColumn('status', function($status){
                if ($status->status == 0) {
                    return "Tidak Aktif";
                }else{
                    return "Aktif";
                }
            })
        ->addColumn('action','
            <a href="javascript:void(0)" onclick="EditKvoucherNotification({{$id}})" data-toggle="tooltip" title="Ubah"><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
            <a href="javascript:void(0)" onclick="confirm_delete_kvoucher_notification({{$id}})" data-toggle="tooltip" title="Hapus"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
            ')
        ->make(true);
    }
}
