<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Statamic\Fields\Blueprint;
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

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'howToAddon');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/courier'),
        ]);

        // More stuff
        $this->autoSetupCollections();
        $this->createNavigation();
    }

    private function createNavigation(): void
    {
        Nav::extend(function ($nav) {
            $nav->create(__('howToAddon::menu.videos'))
                ->icon('assets')
                ->section('How To')
                ->route('howToAddon.index');

            $nav->create(__('howToAddon::menu.manage'))
                ->icon('settings-slider')
                ->section('How To')
                ->route('collections.show', [
                    'collection' => $this->videoCollectionName(),
                ]);
        });
    }

    private function autoSetupCollections(): void
    {
        $this->app->booted(function () {
//            if ( ! Collection::handleExists($this->videoCollectionName())) {

                // Creating Collections
                Collection::make($this->videoCollectionName())
                    ->entryBlueprints(config('howToAddon.blueprint.videos', 'how_to_addon_videos'))
                    ->title('Videos')
                    ->save();

                // Creating Blueprint
                (new Blueprint)
                    ->setHandle(config('howToAddon.blueprint.videos', 'how_to_addon_videos'))
                    ->setContents([
                        'title' => 'Video',
                        'sections' => [
                            'main'    => [
                                'fields' => [
                                    ['handle' => 'video', 'field' => [
                                        'type' => 'assets',
                                        'allow_upload' => true,
                                        'max_files' => 1,
                                        'validate' => 'required'
                                    ]],
                                    ['handle' => 'description', 'field' => [
                                        'character_limit' => 133,
                                        'type' => 'text',
                                        'display' => 'description'
                                    ]]
                                ],
                            ],
                            'sidebar' => [
                                'fields' => [
                                    ['handle' => 'slug', 'field' => ['type' => 'slug']],
                                ],
                            ],
                        ]
                    ])->save();
//            }
        });
    }

    private function videoCollectionName()
    {
        return config('howToAddon.collection.videos', 'how_to_addon_videos');
    }
}