<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpenseCategory;
use App\Models\User;
use App\Models\SiteTheme;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list_theme()
    {
        $themes  = SiteTheme::all();
        return view('admin.settings.theme.list', compact('themes'));
    }

    public function create_theme()
    {
        return view('admin.settings.theme.add');
    }

    public function store_theme(Request $request)
    {
        $user = Auth::user();
        try{
            $theme = new SiteTheme();
            $theme->name          = request('name');
            $theme->color      = request('color');

            $theme->save();
            return redirect(route('admin.settings.theme.list_theme'))->with('flash_success','Theme saved successfully');
        }catch (\Throwable $th){
            //ErrorLog::log('customer', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }

    public function edit_theme($id)
    {
        $theme  = SiteTheme::find($id);
        return view('admin.settings.theme.edit', compact('theme'));
    }

    public function update_theme($id)
    {
        try{
            $theme  = SiteTheme::find($id);
            $theme->name       = request('name');
            $theme->color      = request('color');

            $theme->save();
            return redirect(route('admin.settings.theme.list_theme'))->with('flash_success','Theme updated successfully');
        }catch (\Throwable $th){
            //ErrorLog::log('customer', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }


    public function delete_theme($id)
    {
        try{
            $theme  = SiteTheme::find($id);

            $theme->delete();
            return redirect(route('admin.settings.theme.list_theme'))->with('flash_success','Theme deleted successfully');
        }catch (\Throwable $th){
            //ErrorLog::log('customer', '__METHOD__', $th->getMessage()); //log error
            return back()->with("flash_error","There is an error processing this request");
        }
    }

   
}