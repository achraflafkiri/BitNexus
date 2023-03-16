@extends('layouts.app')

@section('content')
    <section class="card container" style="heigh: 100vh;">
        A torrent project built with Laravel could be a web application that allows users to upload and download torrent
        files. Here is a possible high-level description of such a project:

        User authentication: Users can create an account, log in, and log out. Authentication can be handled using Laravel's
        built-in authentication system or a third-party package.

        Torrent upload: Authenticated users can upload torrent files to the website. The uploaded file is saved to the
        server, and its metadata (such as title, file size, and uploader) is stored in a database.

        Torrent search: Users can search for torrents by title or other metadata. Search can be implemented using Laravel's
        built-in query builder or a third-party package like Scout.

        User profiles: Users have a profile page that displays their uploaded torrents, and other information.

        File storage: Uploaded torrent files are stored on the server, typically in a public directory that is accessible
        through a URL.
    </section>
@endsection
