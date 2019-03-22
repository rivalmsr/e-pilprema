<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Input, DB, Excel, Hash;
use App\Models\Candidates;
use App\Models\Users;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
class ExcelsController extends Controller
{
    public function import_candidates(Request $request)
    {
    	$candidates = Candidates::paginate(2);
    	Excel::load($request->candidates,function($reader){
    		$reader->each(function($sheet){
    			Candidates::firstOrCreate($sheet->toArray());
    		});
    	});
    	return redirect('candidates.index')->with('candidates', $candidates);
    }

    public function export_candidates()
    {
    	$candidates = Candidates::all();
    	Excel::create('Candidate', function($excel) use($candidates){
    		$excel->sheet('Candidate', function($sheet) use($candidates){
    			$sheet->fromArray($candidates);
    		});
    	})->export('xlsx');
    }

    public function import_user(Request $request)
    {
    	ini_set('max_execution_time', 300);
    	$file = $request->file('users');
    	if ($request->graduate=="2019") {
	        Excel::load($file,function($reader){
			    foreach($reader->toObject() as $result) {
			        // Your model namespace here
			        $model = new Users;
			        $model->name = $result->name;
			        $model->nisn = $result->nisn;
			        $model->address = $result->address;
			        $model->gender = $result->gender;
			        $model->born = $result->born;
			        $model->password = $result->password;
			        $model->status = $result->status;
			        $model->graduate = '2019';
			        $model->save();
			    }
		    });
	        $users = Users::all();
	        return redirect('users')->with('users', $users);
    	}elseif ($request->graduate=="2018") {
	        Excel::load($file,function($reader){
			    foreach($reader->toObject() as $result) {
			        // Your model namespace here
			        $model = new Users;
			        $model->name = $result->name;
			        $model->nisn = $result->nisn;
			        $model->address = $result->address;
			        $model->gender = $result->gender;
			        $model->born = $result->born;
			        $model->password = $result->password;
			        $model->status = $result->status;
			        $model->graduate = '2018';
			        $model->save();
			    }
		    });
	        $users = Users::all();
	        return redirect('users')->with('users', $users);    		
    	}else{
    		Excel::load($file,function($reader){
			    foreach($reader->toObject() as $result) {
			        // Your model namespace here
			        $model = new Users;
			        $model->name = $result->name;
			        $model->nisn = $result->nisn;
			        $model->address = $result->address;
			        $model->gender = $result->gender;
			        $model->born = $result->born;
			        $model->password = $result->password;
			        $model->status = $result->status;
			        $model->graduate = '2017';
			        $model->save();
			    }
		    });
	        $users = Users::all();
	        return redirect('users')->with('users', $users);
    	}
    }

    public function import_users(Request $request)
    {
		ini_set('max_execution_time', 300);
    	$file = $request->file('users');
        Excel::load($file,function($reader){
		    foreach($reader->toObject() as $result) {
		    	// dd($result);
		        // Your model namespace here
		        $credentials = [
			        'name' => $result->name,
			        'nisn' => $result->nisn,
			        'address' => $result->address,
			        'gender' => $result->gender,
			        'born' => $result->born,
			        'type_id' => $result->type_id,
			        'graduate' => $result->graduate,
			        'password' => $result->nisn,
			        'status' => $result->status,
		        ];
		        $credent = Sentinel::registerAndActivate($credentials);
		    }
	    });
        $users = Users::all();
        return redirect('users');
    }

    public function export_users($graduate)
    {
		ini_set('max_execution_time', 300);
		if ($graduate=="all") {
			$users_1 = Users::all();
	        foreach ($users_1 as $user) {
	             $data1 [] = array(
	                'id' => $user->id,
	                'name' => $user->name,
	                'nisn' => $user->nisn,
	                'address' => $user->address,
	                'born' => $user->born,
	                'gender' => $user->gender,
	                'graduate' => $user->graduate,
	                'status' => $user->status,
	                'password' => Hash::make($user->nisn),
	                );
	        }
	        Excel::create('Users',function($excel)use($data1){
	            $excel->sheet('All',function($sheet)use($data1){
	                $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('id','Name','Nisn','Address','Born','Gender','graduate','status','Password'))->freezeFirstRow();
	            });
	        })->export('xlsx');
		}
    	if ($graduate=="2019") {
	        $users = Users::where('graduate', '=', $graduate)->get();
	        foreach ($users as $user) {
	                 $data1 [] = array(
	                    'id' => $user->id,
	                    'name' => $user->name,
	                    'nisn' => $user->nisn,
	                    'address' => $user->address,
	                    'born' => $user->born,
	                    'gender' => $user->gender,
	                    'graduate' => $user->graduate,
	                    'status' => $user->status,
	                    'password' => Hash::make($user->nisn),
	                    );
	        }
	        Excel::create('Users',function($excel)use($data1){
	            $excel->sheet('X',function($sheet)use($data1){
	                $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('id','Name','Nisn','Address','Born','Gender','graduate','status','Password'))->freezeFirstRow();
	            });
	        })->export('xlsx');
    	}elseif ($graduate=="2018") {
    		# code...
	        $users = Users::where('graduate', '=', $graduate)->get();
	        foreach ($users as $user) {
	                 $data1 [] = array(
	                    'id' => $user->id,
	                    'name' => $user->name,
	                    'nisn' => $user->nisn,
	                    'address' => $user->address,
	                    'born' => $user->born,
	                    'gender' => $user->gender,
	                    'graduate' => $user->graduate,
	                    'status' => $user->status,
	                    'password' => Hash::make($user->nisn),
	                    );
	        }
	        Excel::create('Users',function($excel)use($data1){
	            $excel->sheet('XI',function($sheet)use($data1){
	                $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('id','Name','Nisn','Address','Born','Gender','graduate','status','Password'))->freezeFirstRow();
	            });
	        })->export('xlsx');
    	}else{
	        $users = Users::where('graduate', '=', $graduate)->get();
	        foreach ($users as $user) {
	                 $data1 [] = array(
	                    'id' => $user->id,
	                    'name' => $user->name,
	                    'nisn' => $user->nisn,
	                    'address' => $user->address,
	                    'born' => $user->born,
	                    'gender' => $user->gender,
	                    'graduate' => $user->graduate,
	                    'status' => $user->status,
	                    'password' => Hash::make($user->nisn),
	                    );
	        }
	        Excel::create('Users',function($excel)use($data1){
	            $excel->sheet('XII',function($sheet)use($data1){
	                $sheet->fromArray($data1,null,'A1',false,false)->prependRow(array('id','Name','Nisn','Address','Born','Gender','graduate','status','Password'))->freezeFirstRow();
	            });
	        })->export('xlsx');	
    	}
    }
}
