@extends('layouts.app')

@section('content')

    <section class="container">
        <section class="col">
            <div class="row">
                <form method="GET" action="/torrents" class="search d-flex input-group mb-3">
                    <input type="search" name="q" class="form-control" placeholder="search..." />
                    <button type="submit" class="btn btn-success">search</button>
                </form>
            </div>
            <div class="row">
                <p>Find your favorite movies, TV shows, music, and more - all in one place with our lightning-fast torrent
                    search engine!</p>
            </div>
            <div class="row cards">
                <p class="small">This is the last thing that was uploaded to the site</p>
                @foreach ($torrents as $torrent)
                <ul class="list-group">
                    <li class="list-group-item">{{ $torrent->title }}</li>
                </ul>
                @endforeach
            </div>
        </section>
    </section>

@endsection
