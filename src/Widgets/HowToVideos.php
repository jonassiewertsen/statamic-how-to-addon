<?php

namespace Jonassiewertsen\Statamic\HowTo\Widgets;

use Jonassiewertsen\Statamic\HowTo\Helper\Video;
use Statamic\Facades\Entry;
use Statamic\Widgets\Widget;

class HowToVideos extends Widget
{
    /**
     * The HTML that should be shown in the widget
     *
     * @return \Illuminate\View\View
     */
    public function html()
    {
        $videos = Entry::whereCollection(Video::collectionName());

        return view('howToAddon::widgets.howToVideos', compact('videos'));
    }
}
