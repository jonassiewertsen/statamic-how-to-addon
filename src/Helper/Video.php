<?php

namespace Jonassiewertsen\Statamic\HowTo\Helper;

class Video
{
    /**
     * Return the documentation collection name
     */
    public static function collectionName(): string
    {
        return config('howToAddon.collection.videos', 'how_to_addon_videso');
    }
}
