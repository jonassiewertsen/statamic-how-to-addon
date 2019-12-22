<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Statamic\Facades\Collection;
use Statamic\Facades\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__.'/routes/cp.php',
    ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'howToAddon');

        $this->autoSetupCollections();
        $this->createNavigation();
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create('Videos')
                ->section('How To')
                ->route('howToAddon.index');

            $nav->create('Manage')
                ->section('How To')
                ->route('collections.show',
                    ['collection' => 'how_to_addon_videos']);
        });
    }

    private function autoSetupCollections(): void {
        $this->app->booted(function () {
            if(! Collection::handleExists('how_to_addon_videos')) {
                Collection::make('how_to_addon_videos')
                    ->title('Videos')
                    ->save();
            }
        });
    }
}