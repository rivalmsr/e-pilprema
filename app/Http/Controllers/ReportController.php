<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Candidates;
use App\Models\Votes;
use App\Models\Users;
use App\Http\Requests;

use PDF;

class ReportController extends Controller
{
    public function officialReport()
    {
    	$data['candidates'] = Candidates::all();
    	$data['votes'] = Votes::all();
    	$data['users'] = Users::whereStatus(1)->count();
        $data['golput'] = Users::whereStatus(0)->whereTypeId(3)->count();
        $data['sum'] = Users::whereTypeId(3)->count();
    	$pdf = PDF::loadView('pdf.officialreport',  array(
                    'candidates' => $data['candidates'],
                    'votes' => $data['votes'],
                    'users' => $data['users'],
                    'golput' => $data['golput'],
                    'sum' => $data['sum']
                ));
		return $pdf->download('officialReport.pdf');
    }
}
