<?php

namespace Jonassiewertsen\Statamic\HowTo\Commands;

use Illuminate\Console\Command;
use Jonassiewertsen\Statamic\HowTo\Helper\Documentation;
use Jonassiewertsen\Statamic\HowTo\Helper\Video;
use Statamic\Facades\Collection;
use Statamic\Fields\Blueprint;
use Statamic\Structures\CollectionStructure;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

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
        Collection::make(Video::collectionName())
            ->entryBlueprints(Video::collectionName())
            ->title('How to videos')
            ->save();
    }

    protected function createBlueprint()
    {
        (new Blueprint)
            ->setHandle(Video::collectionName())
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
