@extends('statamic::layout')

@section('content')
    <div class="flex mb-3">
        <h1 class="flex-1">How To</h1>
    </div>

    <div class="flex flex-wrap card">

        <div class="p-3 -mt-1 w-full">
            <h1>Videos</h1>
            <p>Check out our videos, to get you started as good as possible.</p>
        </div>

        @foreach ($videos as $video)
            <a href="/cp/how-to-addon/video/{{ $video->slug() }}" class="w-full lg:w-1/2 p-3 border-t md:flex items-center hover:bg-grey-10">
                <div class="h-8 w-8 mr-2 hidden md:block text-blue">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M4.435.913l8.936 3.573a1 1 0 0 1 .629.928v16.848a1 1 0 0 1-1.371.927l-8-3.2A1 1 0 0 1 4 19.062V1.739a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1h-2"
                              fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4.552.845l11.636 2.237a1 1 0 0 1 .812.982v16.675a1 1 0 0 1-1 1h-2" fill="none"
                              stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="flex-1 mb-2 md:mb-0 md:mr-3">
                    <h3 class="text-blue text-md font-bold">
                        {{ $video->title }}
                    </h3>
                    <p>{{ $video->description }}</p>
                </div>
            </a>
        @endforeach

    </div>
@stop