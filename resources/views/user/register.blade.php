@extends('home')

@section('register')
    <form action="{{ route('user.register') }}" method="POST" class="mx-auto max-w-lg mt-6 p-2 rounded bg-slate-300">
        @csrf
        <h1 class="text-3xl font-bold ">Register</h1>
        <br>
        <div class="flex flex-col gap-3">
            <label for="" class="flex flex-col gap-2">
                <span>Name</span>
                <input class="p-2 rounded" type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <p class="p-1 text-xs font-bold text-red-600">{{ $message }}</p>
                @enderror
            </label>
            <label for="" class="flex flex-col gap-2">
                <span>Email</span>
                <input class="p-2 rounded" type="text" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="p-1 text-xs font-bold text-red-600">{{ $message }}</p>
                @enderror
            </label>
            <label for="" class="flex flex-col gap-2">
                <span>Password</span>
                <input class="p-2 rounded" type="password" name="password" value="{{ old('password') }}">
                @error('password')
                    <p class="p-1 text-xs font-bold text-red-600">{{ $message }}</p>
                @enderror
            </label>
        </div>
        <br>
        <div class="flex items-center justify-center">
            <button type="submit">Register</button>
        </div>
    </form>
@endsection
