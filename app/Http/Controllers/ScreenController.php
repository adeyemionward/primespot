<?php

namespace App\Http\Controllers;

use App\Models\Screen;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScreenController extends Controller
{


    public function list()
    {
        $screens = Screen::with('venue')->get();
        return view('admin.screens.list', compact('screens'));
    }

    public function create()
    {
        $venues = Venue::all();
        return view('admin.screens.add', compact('venues'));
    }

    public function store(Request $request)
    {

            $validate = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:50'],
                'code' => ['required', 'max:50'],
                'resolution' => ['required', 'string', 'max:50'],
                'orientation' => ['required', 'string'],
                'status' => ['required'],
                'venue' => ['required'],
                'daily_rate' => ['required', 'string'],
            ]);


        try{
            $getScreen = Screen::where('name', $request->name)->first();
            if($getScreen){
                return redirect()->back()->with('flash_error','Screen with this name already exists');
            }

            $screen = new Screen();
            $screen->name         = request('name');
            $screen->code         = request('code');
            $screen->resolution   = request('resolution');
            $screen->orientation  = request('orientation');
            $screen->status       = request('status');
            $screen->venue_id        = request('venue');
            $screen->daily_rate   = request('daily_rate');
            $screen->save();


            if($screen){
                return redirect(route('admin.screens.list'))->with('flash_success','Screen has been created Successful');
            }
        }catch(\Exception $th){
            return redirect()->back()->with('flash_error','An Error Occured: Please try later');
        }
    }


    public function show($id)
    {
        $screen = Screen::where('id',$id)->first();
        return view('admin.screens.view', compact('screen'));
    }

    public function edit($id)
    {
        $screen = Screen::find($id);
        $venues = Venue::all();
        return view('admin.screens.edit', compact('screen','venues'));
    }

    public function update(Request $request, $id)
{
    // Find the existing screen record.
    $screen = Screen::find($id);

    // If the screen doesn't exist, return an error.
    if (!$screen) {
        return redirect()->back()->with('flash_error', 'Screen not found.');
    }

    // Adjust validation rules, especially for 'name' and 'code' to ignore the current record.
    $validate = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:50'],
        'code' => ['required', 'max:50'],
        'resolution' => ['required', 'string', 'max:50'],
        'orientation' => ['required', 'string'],
        'status' => ['required'],
        'venue' => ['required'],
        'daily_rate' => ['required', 'string'],
    ]);

    // If validation fails, return with errors.
    if ($validate->fails()) {
        return redirect()->back()->withErrors($validate)->withInput();
    }

    try {
        // Update the screen's attributes.
        $screen->name = $request->name;
        $screen->code = $request->code;
        $screen->resolution = $request->resolution;
        $screen->orientation = $request->orientation;
        $screen->status = $request->status;
        $screen->venue_id = $request->venue;
        $screen->daily_rate = $request->daily_rate;
        $screen->save();

        if ($screen) {
            return redirect(route('admin.screens.list'))->with('flash_success', 'Screen has been updated successfully.');
        }
    } catch (\Exception $th) {
        // Log the error for debugging.
        \Log::error($th);
        return redirect()->back()->with('flash_error', 'An Error Occured: Please try later');
    }
}

    public function activate($id){
        $screen = Screen::where('id',$id)->first();
        $screen->status = 'available';
        $screen->save();
        return back()->with("flash_success","screen activated successfully");
    }

    public function deactivate($id){
        $screen = Screen::where('id',$id)->first();
        $screen->status = 'unavailable';
        $screen->save();
        return back()->with("flash_success","screen deactivated successfully");
    }

    public function getVenueScreens(Venue $venue)
    {
        return response()->json($venue->screens()->where('status', 'available')->get());
    }

}
