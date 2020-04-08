<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Illuminate\Support\Facades\Gate;
use Jonassiewertsen\Statamic\HowTo\Commands\Setup;
use Statamic\Facades\Collection;
use Statamic\Facades\CP\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__ . '/routes/cp.php',
    ];

    protected $commands = [
        Setup::class,
    ];

    protected $widgets = [
        \Jonassiewertsen\Statamic\HowTo\Widgets\HowToVideos::class,
    ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'howToAddon');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'howToAddon');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'howToAddon');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/jonassiewertsen/howToAddon/'),
            ], 'How To Addon lang file');

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('how_to_addon.php'),
            ], 'How To Addon config file');
        }

        $this->createNavigation();
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create(__('howToAddon::menu.videos'))
                ->icon('assets')
                ->section('How To')
                ->route('howToAddon.index');

            // Only show the Manage button, if the permissions have been set
            if (Gate::allows('edit', Collection::findByHandle(config('howToAddon.collection.videos', 'how_to_addon_videos')))) {
                $nav->create(__('howToAddon::menu.manage'))
                    ->icon('settings-slider')
                    ->section('How To')
                    ->route('collections.show', [
                        'collection' => $this->videoCollectionName(),
                    ]);
            }
        });
    }

    private function loadCommands(array $commands) {
        if ($this->app->runningInConsole()) {
            $this->commands($commands);
        }
    }

    private function videoCollectionName()
    {
        return config('howToAddon.collection.videos', 'how_to_addon_videos');
    }
}
