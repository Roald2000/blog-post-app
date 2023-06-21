<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    @vite('./resources/css/app.css')
</head>

<body>
    <header class="container mx-auto flex flex-row justify-between gap-3 p-2 bg-red-600">
        @auth
            <h1>Welcome {{ auth()->user()->name }}</h1>
            <form action="{{ route('user.logout') }}" method="POST">
                @csrf
                <button class="text-white" type="submit">Logout</button>
            </form>
        @else
            <div class="flex-end">
                <a href="{{ route('user.login') }}">Login</a>
                <a href="{{ route('user.register') }}">Register</a>
            </div>
        @endauth
    </header>
    <main class="container mx-auto p-2">

        @auth
            <div class="border border-red-600 p-2 max-w-md mx-auto rounded">
                <h1 class="text-red-600 text-3xl">Create Post</h1>
                <br>
                <form action="{{ route('post.create') }}" method="POST" class="flex flex-col gap-2">
                    @csrf
                    <label for="" class="flex flex-col gap-1">
                        <span>Title</span>
                        <input class="p-2 rounded border border-red-600" type="text" name="title" id="">
                    </label>
                    <label for="" class="flex flex-col gap-1">
                        <span>Body</span>
                        <textarea class="resize-none p-2 rounded border border-red-600" name="body" id="" cols="auto"
                            rows="5"></textarea>
                    </label>
                    <button class="p-2 rounded border border-red-600 text-red-600 hover:bg-red-600 hover:text-white"
                        type="submit" class="">Post</button>
                </form>
            </div>
            <br>
            <hr class="w-full bg-red-600 h-1">
            <div class="max-w-md mx-auto p-2">
                <h1 class="text-3xl font-bold text-red-600">Posts</h1>
                @if (count($posts) === 0)
                    <p>No Posts</p>
                @else
                    @foreach ($posts as $post)
                        <div class="h-fit my-2 max-w-lg border-red-600 border p-4 rounded shadow-md">
                            <div>
                                <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                                <a href="{{ route('post.edit', ['id' => $post->id]) }}">Edit</a>
                            </div>
                            <div>
                                <h1>{{ $post->title }}</h1>
                                <p>{{ $post->body }}y</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        @else
            @yield('register')
            @yield('login')
        @endauth

    </main>
</body>

</html>
