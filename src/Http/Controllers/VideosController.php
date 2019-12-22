<?php

namespace Jonassiewertsen\Statamic\HowTo\Http\Controllers;

use Statamic\Facades\Asset;
use Statamic\Facades\Entry;

class VideosController {
    public function index() {
        $videos = Entry::whereCollection('how_to_addon_videos');

        return view('howToAddon::videos.index', compact('videos'));
    }

    public function show($slug) {
        $video = Entry::findBySlug($slug, config('howToAddon.blueprint.videos', 'how_to_addon_videos'));

        $url = '/assets/' . $video->video;

        return view('howToAddon::videos.show', compact('video', 'url'));
    }
}