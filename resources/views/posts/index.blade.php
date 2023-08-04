<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Noticias</title>
        <link rel="stylesheet" href="/app.css" >
    </head>
    <body class="antialiased">
    <div id="nav-menu" class="relative sm:flex sm:justify-end sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <!-- Additional Menu Items -->
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ route('posts.page', ['page' => 1]) }}">API_noticias</a>
            <a href="{{ route('posts.api', ['id' => 1]) }}">API_noticia</a>
            <!-- End of Additional Menu Items -->

            @auth
                <a href="{{ url('/dashboard') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>



        <article>
        @foreach($posts as $post)
            <div class="post">
                <h3>
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h3>
                <img src="{{ $post->image }}" alt="Post Image">
                <p>Fecha de publicación: {{ $post->created_at }}</p>
            </div>
        @endforeach
        </article>

    </body>
</html>