<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\JobOrder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index(Request $request)
    {


        $today   =   Carbon::now()->format('Y-m-d');
       // $today    =   Carbon::parse($today1);


        $from   =   $request->input('date_from');
        $to     =   $request->input('date_to');
       
        return view('admin.dashboard');
    }
}
