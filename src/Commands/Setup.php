<?php

namespace Jonassiewertsen\Statamic\HowTo\Commands;

use Illuminate\Console\Command;
use Statamic\Facades\Collection;
use Statamic\Fields\Blueprint;

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

        $this->info('Everything as been setup your. Cheers!');
    }

    private function createCollections() {
        Collection::make(config('howToAddon.collection.videos', 'how_to_addon_videos'))
            ->entryBlueprints(config('howToAddon.blueprint.videos', 'how_to_addon_videos'))
            ->title('Videos')
            ->save();
    }

    protected function createBlueprints()
    {
        $blueprint = new Blueprint;

        $blueprint->setHandle(config('howToAddon.blueprint.videos', 'how_to_addon_videos'))
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
    }
}