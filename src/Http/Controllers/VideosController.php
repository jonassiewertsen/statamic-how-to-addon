<?php

namespace Jonassiewertsen\Statamic\HowTo\Http\Controllers;

use Statamic\Facades\Entry;

class VideosController {
    public function index() {
        $videos = Entry::whereCollection('how_to_addon_videos');

        return view('howToAddon::videos.index', compact('videos'));
    }
}