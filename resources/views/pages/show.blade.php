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
        @if ($torrent)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">time</th>
                    <th scope="col">size</th>
                    <th scope="col">uploader</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $torrent->title }}</td>
                    <td>{{ $torrent->time }}</td>
                    <td>{{ $torrent->size }}</td>
                    <td>{{ $torrent->name }}</td>
                    <td>
                        <form action="/torrents/{{ $torrent->id }}/edit" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="/torrents/{{ $torrent->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <h1>No Torrents</h1>
        @endif
    </div>
</section>


@endsection
