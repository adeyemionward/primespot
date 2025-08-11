<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VenueController extends Controller
{
    public function list()
    {
        $venues = Venue::all();
        return view('admin.venues.list', compact('venues'));
    }

    public function create()
    {
        return view('admin.venues.add');
    }

    public function store(Request $request)
    {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:50'],
                'city' => ['required', 'max:50'],
                'state' => ['required', 'string', 'max:50'],
                'address' => ['required', 'string'],
            ]);


        try{
            $getVenue = Venue::where('name', $request->name)->first();
            if($getVenue){
                return redirect()->back()->with('flash_error','Venue with this name already exists');
            }

            $venue = new Venue();
            $venue->name         = request('name');
            $venue->city         = request('city');
            $venue->state        = request('state');
            $venue->status        = request('status');
            $venue->address      = request('address');
            $venue->save();


            if($venue){
                return redirect(route('admin.venues.list'))->with('flash_success','Venue has been created Successful');
            }
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }

    }

    public function show($id)
    {
        $venue = Venue::where('id',$id)->first();
        return view('admin.venues.view', compact('venue'));
    }

    public function edit($id)
    {
        $venue = Venue::find($id);
        return view('admin.venues.edit', compact('venue'));
    }

    public function update(Request $request, $id)
    {
        // Find the existing venue record.
        $venue = Venue::find($id);

        // If the venue doesn't exist, return an error.
        if (!$venue) {
            return redirect()->back()->with('flash_error', 'Venue not found.');
        }

        // Adjust validation rules to ignore the current venue's name.
        $validate = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50'],
            'city' => ['required', 'max:50'],
            'state' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string'],
            'status' => ['required'],
        ]);

        // If validation fails, return with errors.
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        try {
            // Update the venue's attributes.
            $venue->name = $request->name;
            $venue->city = $request->city;
            $venue->state = $request->state;
            $venue->status = $request->status;
            $venue->address = $request->address;
            $venue->save();

            if ($venue) {
                return redirect(route('admin.venues.list'))->with('flash_success', 'Venue has been updated successfully.');
            }
        } catch (\Exception $th) {
            // Log the error for debugging.
            \Log::error($th);
            return redirect()->back()->with('flash_error', 'An Error Occurred: Please try later');
        }
    }

    public function screens($id)
    {
        $screens = Screen::where('venue_id',$id)->get();
        $venue = Venue::where('id',$id)->first();
        return view('admin.venues.screens', compact('screens','venue'));
    }

      public function activate($id){
        $screen = Venue::where('id',$id)->first();
        $screen->status = 'active';
        $screen->save();
        return back()->with("flash_success","Venue activated successfully");
    }

    public function deactivate($id){
        $screen = Venue::where('id',$id)->first();
        $screen->status = 'inactive';
        $screen->save();
        return back()->with("flash_success","Venue deactivated successfully");
    }
}
