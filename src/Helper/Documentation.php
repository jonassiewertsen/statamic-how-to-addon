<?php

namespace Jonassiewertsen\Statamic\HowTo\Helper;

use Illuminate\Support\Collection as LaravelCollection;
use Statamic\Facades\Collection;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;

class Documentation
{
    /**
     * Fetch the Tree of the belonging Collection
     */
    public static function tree(): LaravelCollection {
        $tree = Collection::findByHandle(self::collectionName())
            ->structure()
            ->in(Site::selected()->handle())->tree();

        return collect($tree);
    }

    /**
     * Fetch the belonging children for the navigation
     */
    public static function entryChildren($tree, $nav): LaravelCollection
    {
        if (! isset($tree['children'])) {
            return collect();
        }

        return collect($tree['children'])->map(function ($child) use ($nav) {
            return $nav->item(self::entryTitle($child['entry']))
                       ->route('howToAddon.documentation.show', Documentation::entrySlug($child['entry']));
        });
    }

    /**
     * Return the entry title
     */
    public static function entryTitle($entry): string
    {
        return Entry::find($entry)->title;
    }

    /**
     * Return the slug
     */
    public static function entrySlug($entry): string
    {
        return Entry::find($entry)->slug();
    }

    /**
     * Return the documentation collection name
     */
    public static function collectionName(): string
    {
        return config('howToAddon.collection.documentation', 'how_to_addon_documentation');
    }
}
