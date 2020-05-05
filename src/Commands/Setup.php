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
    protected $description = 'Setup Collections and stuff for the "How To Addon"';

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
        $this->createCollections();
        $this->createBlueprints();

        $this->info('Everything has been setup for you. Cheers!');
    }

    private function createCollections() {
        Collection::make(Video::collectionName())
            ->entryBlueprints(Video::collectionName())
            ->title('How to videos')
            ->save();

        Collection::make(Documentation::collectionName())
            ->entryBlueprints(Documentation::collectionName())
            ->title('How to documentation')
            ->structure((new CollectionStructure)->maxDepth(2))
            ->save();
    }

    protected function createBlueprints()
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

        (new Blueprint)
            ->setHandle(Documentation::collectionName())
            ->setContents([
                'title' => 'How to documentation',
                'sections' => [
                    'main' => [
                        'fields' => [
                            ['handle' => 'content', 'field' =>[
                                'restrict'              => false,
                                'automatic_line_breaks' => true,
                                'automatic_links'       => false,
                                'escape_markup'         => false,
                                'smartypants'           => false,
                                'type'                  => 'markdown',
                                'localizable'           => false,
                                'listable'              => 'hidden',
                                'display'               => 'Content',
                            ]]
                        ]
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
