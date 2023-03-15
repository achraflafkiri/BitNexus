@extends('layouts.app')

@section('content')

    <section class="container">
        <section class="col">
            <div class="row">
                <form method="GET" action="/torrents" class="search d-flex input-group mb-3">
                    <input type="search" name="q" class="form-control" placeholder="search..." />
                    <button type="submit">search</button>
                </form>
            </div>
            <div class="row">
                <p>Find your favorite movies, TV shows, music, and more - all in one place with our lightning-fast torrent
                    search engine!</p>
            </div>
            <div class="row cards">
                <ul class="list-group">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>
        </section>
    </section>

@endsection
