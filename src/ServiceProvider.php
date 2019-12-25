<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Illuminate\Support\Facades\Gate;
use Jonassiewertsen\Statamic\HowTo\Commands\Setup;
use Statamic\Facades\Collection;
use Statamic\Facades\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__ . '/routes/cp.php',
    ];

    public function boot()
    {
        parent::boot();

        // Views
        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'howToAddon');

        // Config
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'howToAddon');

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('how_to_addon.php'),
        ], 'config');

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'howToAddon');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/jonassiewertsen/howToAddon/'),
        ], 'lang');

        // Commands
        $this->loadCommands([
            Setup::class,
        ]);

        // Navigation
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