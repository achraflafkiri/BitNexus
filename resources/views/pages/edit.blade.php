@extends('layouts.app')
@section('title', 'this is the edit page')


@section('content')
    <section class="col">
        <div class="col flex-center">
            <form method="POST" action="/torrents/{{ $torrent->id }}">
                @csrf
                @method('PUT')
                <div>
                    <p>Let's Edit new torrent file? <span class="text-info">Torrent</span></p>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" name="name" value="{{ old('name', $torrent->name) }}" class="form-control"
                        id="name">
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">time</label>
                    <input type="text" name="time" value="{{ old('time', $torrent->time) }}" class="form-control"
                        id="time">
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">size</label>
                    <input type="text" name="size" value="{{ old('size', $torrent->size) }}" class="form-control"
                        id="size">
                </div>
                <div class="mb-3">
                    <label for="uploader" class="form-label">uploader</label>
                    <input type="text" name="uploader" value="{{ old('uploader', $torrent->uploader) }}"
                        class="form-control" id="uploader">
                </div>
                <button type="submit" class="button button-success text-white border-0 .p-2 button-form">Submit</button>
            </form>
        </div>
    </section>
@endsection
