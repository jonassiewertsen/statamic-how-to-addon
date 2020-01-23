<?php

namespace Jonassiewertsen\Statamic\HowTo\Widgets;

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
        $videos = Entry::whereCollection('how_to_addon_videos');

        return view('howToAddon::widgets.howToVideos', compact('videos'));
    }
}
