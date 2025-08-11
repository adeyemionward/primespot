<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use Carbon\Carbon;



class SubscriptionController extends Controller
{
    
    protected $today;

    public function __construct()
    {
        // Get today's date
        $this->today = Carbon::today()->toDateString();
    }

    public function activeSubscription() 
    {
        $active_subscriptions = Subscription::where('sub_end_date', '>=', $this->today)->where('status', 'active')->get();
        return view('admin.subscriptions.active', compact('active_subscriptions'));
    }

    public function inactiveSubscription()
    {
        $inactive_subscriptions = Subscription::where('sub_end_date', '<', $this->today)->get();
        return view('admin.subscriptions.inactive', compact('inactive_subscriptions'));
    }

}