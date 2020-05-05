<?php

namespace Jonassiewertsen\Statamic\HowTo\Http\Controllers;

use Statamic\Facades\Entry;

class VideosController {
    public function index()
    {
        $videos = Entry::whereCollection('how_to_addon_videos');

        $videos = $this->sortByTitle($videos);

        return view('howToAddon::videos.index', compact('videos'));
    }

    public function show($slug)
    {
        $video = Entry::findBySlug($slug, config('howToAddon.blueprint.videos', 'how_to_addon_videos'));

        // TODO: Should be replaced by Asset::findByPath later.
        // https://github.com/statamic/cms/issues/1155
        $url = '/assets/' . $video->video;

        return view('howToAddon::videos.show', compact('video', 'url'));
    }

    private function sortByTitle($videos)
    {
        return collect($videos)->sortBy('title');
    }
}
