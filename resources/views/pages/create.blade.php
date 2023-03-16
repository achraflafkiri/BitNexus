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
                    <input type="file" name="file"  value="{{ old("file", "") }}" class="form-control @error('file') is-invalid @enderror" id="file">
                </div>
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title"  value="{{ old("title", "") }}" class="form-control @error('title') is-invalid @enderror" id="title">
                </div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label for="size" class="form-label">size</label>
                    <input type="text" name="size"  value="{{ old("size", "") }}" class="form-control @error('size') is-invalid @enderror" id="size">
                </div>
                 @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="button button-success text-white border-0 .p-2 button-form">Create</button>
            </form>
        </div>
    </section>
@endsection
