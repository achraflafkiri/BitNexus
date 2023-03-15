<?php

namespace App\Http\Controllers;

use App\Models\Torrent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class torrentController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        $torrents = DB::table('torrents')
            ->where('name', 'like', "%$q%")
            ->get();
        
            if (!$torrents) {
                $torrents = "";
            }
        
        return view("pages.index", ['torrents' => $torrents]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $torr = new Torrent;
        $torr->name = $request->input('name');
        $torr->time = $request->input('time');
        $torr->size = $request->input('size');
        $torr->uploader = $request->input('uploader');
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
        $torrent->name = $request->input('name');
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
