<?php

namespace Jonassiewertsen\Statamic\HowTo\Http\Controllers;

use Jonassiewertsen\Statamic\HowTo\Helper\Video;
use Statamic\Facades\Entry;

class VideosController {
    public function index()
    {
        $videos = Entry::whereCollection(Video::collectionName());

        $videos = $this->sortByTitle($videos);

        return view('howToAddon::videos.index', compact('videos'));
    }

    public function show($slug)
    {
        $video = Entry::findBySlug($slug, Video::collectionName());

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
