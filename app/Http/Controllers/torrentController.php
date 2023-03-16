<?php

namespace App\Http\Controllers;

use App\Exceptions\AppError;
use App\Models\Torrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class torrentController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // SELECT torrents.*, users.name 
        // FROM torrents 
        // INNER JOIN users ON users.id = torrents.user_id 
        // WHERE name LIKE '%$q%'
        $torrents = DB::table('torrents')
            ->join('users', 'users.id', '=', 'torrents.user_id')
            ->select('torrents.*', 'users.name')
            ->where('title', 'like', "%$q%")
            ->get();

        if (!$torrents) {
            $torrents = "";
        }

        // dd($torrents);
        return view("pages.index", ['torrents' => $torrents]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the incoming request data
        $validatedData = $request->validate([
            'file' => 'required|mimetypes:application/x-bittorrent,application/zip',
            'title' => "required|string",
            'size' => "required|string",
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        // Generate a unique name for the file
        $filename = time() . '_' . $file->getClientOriginalName();

        // Move the file to the uploads directory
        $file->move(public_path('uploads'), $filename);

        // Extract the field values from the request
        $title = $request->input("title");
        $size = $request->input("size");
        $user_id_ = $user->id;

        // Throw an error if any of the required fields are missing
        if (!$title || !$size || !$user_id_) {
            throw new AppError('All fields are required', 422);
        }

        // Create a new Torrent model and save it to the database
        $torr = new Torrent;
        $torr->file = $filename;
        $torr->path = public_path('uploads') . '/' . $filename;
        $torr->title = $title;
        $torr->size = $size;
        $torr->user_id = $user_id_;
        $torr->save();

        // Redirect to the torrents page
        return redirect('/torrents');
    }

    public function show(Torrent $torrent)
    {

        // select t.* , u.name
        // from torrents t inner join users u
        // on t.user_id=u.id
        $torrentD = DB::table("torrents")
            ->join('users', 'users.id', '=', 'torrents.user_id')
            ->select('torrents.*', 'users.name')
            ->where("torrents.id", '=', $torrent->id)
            ->first();

        // dd($torrentD);
        // return view('pages.show', ['torrent' => $torrentD]);
        return view('pages.show', ['torrent' => $torrentD]);
    }

    public function edit(Torrent $torrent)
    {
        return view('pages.edit', ['torrent' => $torrent]);
    }

    public function update(Request $request, Torrent $torrent)
    {
        $torrent->title = $request->input('title');
        $torrent->time = $request->input('time');
        $torrent->size = $request->input('size');
        $torrent->uploader = $request->input('uploader');
        $torrent->save();
        return redirect('/');
    }


    public function destroy(Torrent $torrent)
    {
        $torrent->delete();
        return redirect('/');
    }
}
