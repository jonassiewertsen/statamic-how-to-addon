<?php

namespace Jonassiewertsen\Statamic\HowTo;

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
    }

}