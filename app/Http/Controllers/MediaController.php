<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   

    public function index()
    {
        // Logic to retrieve and display media files
        $mediaFiles = Media::where('company_id', app('company_id'))->get();
        return view('company.media.index', compact('mediaFiles'));
    }

    public function upload(Request $request)
    {
        // Logic to handle media file upload
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('media', 'public');

        Media::create([
            'company_id' => app('company_id'),
            'path' => $path,
            'name' => $file->getClientOriginalName(),
        ]);

        return redirect()->back()->with('success', 'Media uploaded successfully.');
    }
}
