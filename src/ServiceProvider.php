<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Illuminate\Support\Facades\Gate;
use Jonassiewertsen\Statamic\HowTo\Commands\Setup;
use Jonassiewertsen\Statamic\HowTo\Helper\Documentation;
use Statamic\Facades\Collection;
use Statamic\Facades\CP\Nav;
use Statamic\Facades\Entry;
use Statamic\Facades\Site;
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
        // TODO: What about, if there are no entrys or no children?

        Nav::extend(function ($nav) {
            $nav->create(__('howToAddon::menu.videos'))
                ->icon('assets')
                ->section('How To')
                ->route('howToAddon.index');

            // Only show the Manage button, if the permissions have been set
            if (Gate::allows('edit', Collection::findByHandle($this->videoCollectionName()))) {
                $nav->create(__('howToAddon::menu.manage'))
                    ->icon('settings-slider')
                    ->section('How To')
                    ->route('collections.show', [
                        'collection' => $this->videoCollectionName(),
                    ]);
            }
        });

        Nav::extend(function ($nav) {

            Documentation::tree()->map(function ($tree) use ($nav) {
                return $nav->create(Documentation::entryTitle($tree['entry']))
                            ->icon('drawer-file')
                            ->section('Documentation')
                            ->children(Documentation::entryChildren($tree, $nav));
            });

            // Only show the Manage button, if the permissions have been set
            if (Gate::allows('edit', Collection::findByHandle(Documentation::collectionName()))) {
                $nav->create(__('howToAddon::menu.manage'))
                    ->icon('settings-slider')
                    ->section('Documentation')
                    ->route('collections.show', [
                        'collection' => Documentation::collectionName(),
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
