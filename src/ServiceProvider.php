<?php

namespace Jonassiewertsen\Statamic\HowTo;

use Statamic\Facades\Collection;
use Statamic\Facades\Nav;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $scripts = [
//        __DIR__ . '/../public/js/link-fieldtype.js'
    // TODO: Clean up if not needed
    ];

    public function boot()
    {
        parent::boot();

        Nav::extend(function ($nav) {
            $nav->create('Videos')
                ->section('How To')
                ->route('dashboard')
                ->icon('coin');
        });


        //        Nav::extend(function ($nav) {
//            $nav->create('Documentation')
//                ->section('How To')
//                ->route('dashboard')
//                ->icon('coin');
//        });

        $this->app->booted(function() {
//            $collection = Collection::make('test');
//            $collection->title('Test');
//            $collection->save();
        });
    }
}