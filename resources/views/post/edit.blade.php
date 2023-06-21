<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('./resources/css/app.css')
    <title>Edit</title>
</head>

<body>
    <div class="border border-red-600 p-2 max-w-md mx-auto rounded">
        <h1 class="text-red-600 text-3xl">Update Post</h1>
        <br>
        <form action="{{ route('post.update', $post->id) }}" method="POST" class="flex flex-col gap-2">
            @csrf
            @method('PUT')
            <label for="" class="flex flex-col gap-1">
                <span>Title</span>
                <input value="{{ $post->title }}" class="p-2 rounded border border-red-600" type="text"
                    name="title" id="">
            </label>
            <label for="" class="flex flex-col gap-1">
                <span>Body</span>
                <textarea class="resize-none p-2 rounded border border-red-600" name="body" id="" cols="auto"
                    rows="5">{{ $post->body }}</textarea>
            </label>
            <button class="p-2 rounded border border-red-600 text-red-600 hover:bg-red-600 hover:text-white"
                type="submit" class="">Post</button>
        </form>
    </div>
</body>

</html>
