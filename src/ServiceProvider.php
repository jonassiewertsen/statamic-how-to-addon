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

        $this->loadViewsFrom(__DIR__ . '/../resources/views/', 'howToAddon');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'howToAddon');

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
                                        'character_limit' => 150,
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