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

        <div class="w-full lg:w-1/2 p-3 border-t md:flex items-start">
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
                    01 How to create Entries
                </h3>
                <p class="">Get to know Statamic by understanding its capabilities the right way.</p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 p-3 border-t md:flex items-start">
            <div class="h-8 w-8 mr-2 hidden md:block text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M19.479 8V2.5a2 2 0 0 0-2-2h-12a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h8l3 3v-3h1a2 2 0 0 0 1.721-.982"
                          fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M1.485 3.764A2 2 0 0 0 .479 5.5v16a2 2 0 0 0 2 2h8a2 2 0 0 0 1.712-.967M5.479 3.5h4m-2 4.5V3.5M15.7 7.221l-4.2-1.2 1.2 4.2 7.179 7.179a2.121 2.121 0 0 0 3-3zm3.279 9.279l3-3M12.7 10.221l3-3M12.479 3.5h4m-10 8h4m-4 3h6.5m-6.5 3h9"
                          fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="flex-1 mb-2 md:mb-0 md:mr-3"><h3 class="mb-0">Collections</h3>
                <p>Collections contain the different types of content in your site.</p> <a
                        href="http://statamic.test/cp/collections/create" class="text-blue text-sm font-bold">
                    Create Collection →
                </a></div>
        </div>
        <div class="w-full lg:w-1/2 p-3 border-t md:flex items-start">
            <div class="h-8 w-8 mr-2 hidden md:block text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <circle cx="4" cy="20" r="3.5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round"></circle>
                    <circle cx="4" cy="20" r="1.5" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round"></circle>
                    <path d="M.5 20V4a3.5 3.5 0 0 1 7 0v16" fill="none" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                    <path d="M4 23.5h18.5a1 1 0 0 0 1-1v-18a1 1 0 0 0-1-1h-15" fill="none" stroke="currentColor"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M15.5 18.5H11a.5.5 0 0 1-.5-.5V9.309a.5.5 0 0 1 .724-.447L15.5 11zM15.5 12.5H20a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-4.5M10.5 12.5H13M10.5 14.5H13M15.5 11V8.5M19.5 12.5V10M15.5 14.5H18M15.5 16.5H18"
                          fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="flex-1 mb-2 md:mb-0 md:mr-3"><h3 class="mb-0">Blueprints</h3>
                <p>Blueprints define the custom fields used to create and store your content.</p> <a
                        href="http://statamic.test/cp/fields/blueprints/create" class="text-blue text-sm font-bold">
                    Create Blueprint →
                </a></div>
        </div>
        <div class="w-full lg:w-1/2 p-3 border-t md:flex items-start">
            <div class="h-8 w-8 mr-2 hidden md:block text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke="currentColor" fill="none" stroke-width="1.5" stroke-linecap="round"
                       stroke-linejoin="round">
                        <path d="M16.5 23.248H21a.75.75 0 0 0 .75-.75v-4.939a.752.752 0 0 0-.219-.53l-1.06-1.061a.747.747 0 0 0-.53-.22H16.5a.75.75 0 0 0-.75.75v6c0 .414.336.75.75.75zM16.5 9.748H21A.75.75 0 0 0 21.75 9V4.059a.752.752 0 0 0-.219-.53l-1.06-1.061a.747.747 0 0 0-.53-.22H16.5a.75.75 0 0 0-.75.75V9a.75.75 0 0 0 .75.748zM2.25.748v1.5M2.25 5.248v3M2.25 11.248v3M2.25 17.248v1.5a1.5 1.5 0 0 0 1.5 1.5h1.5M8.25 20.248h3M14.25 20.248h1.5M2.25 6.748h3M8.25 6.748h3M14.25 6.748h1.5"></path>
                    </g>
                </svg>
            </div>
            <div class="flex-1 mb-2 md:mb-0 md:mr-3"><h3 class="mb-0">Structures</h3>
                <p>Structures establish the hierarchy of your pages and help you manage your site navigation.</p> <a
                        href="http://statamic.test/cp/structures/create" class="text-blue text-sm font-bold">
                    Create Structure →
                </a></div>
        </div>
    </div>
@stop