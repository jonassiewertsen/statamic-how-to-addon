<?php

namespace Jonassiewertsen\Statamic\HowTo\Commands;

use Illuminate\Console\Command;
use Jonassiewertsen\Statamic\HowTo\Helper\Video;
use Statamic\Facades\Blueprint;
use Statamic\Facades\Collection;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'howToAddon:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting up the collection and blueprint for the "How To Addon"';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createCollection();
        $this->createBlueprint();

        $this->info('Everything has been setup for you. Cheers!');
    }

    private function createCollection() {
        if (Collection::handleExists(Video::collectionName())) {
            return; // Don't create in case the collection already exists.
        }

        Collection::make(Video::collectionName())
            ->title('How to videos')
            ->save();
    }

    protected function createBlueprint()
    {
        if (Blueprint::find(Video::collectionName())) {
            return; // Don't create in case the blueprint already exists.
        }

        (new \Statamic\Fields\Blueprint)
            ->setHandle(Video::collectionName())
            ->setNamespace('collections.'.Video::collectionName())
            ->setContents([
                'title' => 'How to Video',
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
                                'type'            => 'text',
                                'display'         => 'description',
                            ]]
                        ],
                    ],
                    'sidebar' => [
                        'fields' => [
                            ['handle' => 'slug', 'field' => [
                                'type'          => 'slug',
                                'localizable'   => false,
                                'listable'      => 'hidden',
                                'display'       => 'Slug',
                                'validate'      => 'required',
                            ]],
                        ],
                    ],
                ]
            ])->save();
    }
}
