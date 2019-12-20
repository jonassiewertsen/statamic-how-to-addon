<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Statamic\Facades\Collection;
use Statamic\Facades\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function boot()
    {
        parent::boot();

        // TODO: Refactor the Collection create method
        $this->app->booted(function () {
            if(! Collection::handleExists('how_to_addon_videos')) {
                Collection::make('how_to_addon_videos')
                    ->title('Videos')
                    ->save();
            }
        });

        // TODO: Refactor the Navigation rearranging
        Nav::extend(function ($nav) {
            $nav->create('Videos')
                ->section('How To')
                ->route('dashboard');

            $nav->create('Manage')
                ->section('How To')
                ->route('collections.show',
                    ['collection' => 'how_to_addon_videos']);
        });
    }
}