@extends('layouts.app')
@section('title', 'this is the contact')


@section('content')
    <section class="col">
        <div class="col flex-center">
            <form method="POST" action="/torrents/post" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <div>
                    <p>Let's create new torrent file? <span class="text-info">Torrent</span></p>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">file</label>
                    <input type="file" name="file" class="form-control" id="file">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="size" class="form-label">size</label>
                    <input type="text" name="size" class="form-control" id="size">
                </div>
                <button type="submit" class="button button-success text-white border-0 .p-2 button-form">Create</button>
            </form>
        </div>
    </section>
@endsection
