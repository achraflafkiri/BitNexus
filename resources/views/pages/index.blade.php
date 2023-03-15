@extends('layouts.app')

@section('content')

    <section class="container">
        <div class="row">
            <form method="GET" action="/torrents" class="search d-flex input-group mb-3">
                <input type="search" name="q" class="form-control" placeholder="search..." />
                <button type="submit">search</button>
            </form>
        </div>
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">time</th>
                        <th scope="col">size</th>
                        <th scope="col">uploader</th>
                    </tr>
                </thead>
                <tbody>                    
                    @foreach ($torrents as $torrent)
                        <tr>
                            <td>
                                <a href="/torrents/{{ $torrent->id }}">{{ $torrent->name }}</a>
                            </td>
                            <td>{{ $torrent->time }}</td>
                            <td>{{ $torrent->size }}</td>
                            <td>{{ $torrent->uploader }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
