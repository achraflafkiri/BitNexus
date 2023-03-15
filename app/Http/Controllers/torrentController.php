<?php

namespace App\Http\Controllers;

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
        $torr = new Torrent;
        $torr->title = $request->input('title');
        $torr->time = $request->input('time');
        $torr->size = $request->input('size');

        $user = Auth::user();
        $torr->user_id = $user->id;

        $torr->save();
        return redirect('/torrents');
    }

    public function show(Torrent $torrent)
    {
        return view('pages.show', ['torrent' => $torrent]);
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
