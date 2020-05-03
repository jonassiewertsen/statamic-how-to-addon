@extends('statamic::layout')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">How To</h1>
    </div>

    <div class="flex flex-wrap card">

        <div class="p-3 -mt-2 w-full">
            <a href="{{ route('statamic.cp.howToAddon.videos.index') }}" class="block mb-1">< {{ __('howToAddon::general.back') }}</a>
            <h1 class="mb-2">{{ $video->title }}</h1>

            <video class="w-full" controls>
                <source src="{{ $url }}">
                Your browser does not support the video tag.
            </video>

            @if ($video->description)
                <p class="mt-2 text-grey-90">{{ $video->description }}</p>
            @endif
        </div>

    </div>

@stop
