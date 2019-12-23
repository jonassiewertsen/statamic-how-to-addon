@extends('statamic::layout')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">How To</h1>
    </div>

    <div class="flex flex-wrap card">

        <div class="p-3 -mt-2 w-full">
            <a href="{{ route('statamic.cp.howToAddon.index') }}" class="block mb-1">< Back</a>
            <h1 class="mb-2">{{ $video->title }}</h1>

            <video class="w-full" controls>
                <source src="{{ $url }}">
                Your browser does not support the video tag.
            </video>

            <p class="mt-2">{{ $video->description }}</p>
        </div>

    </div>

    @include('howToAddon::partials.footer')
@stop