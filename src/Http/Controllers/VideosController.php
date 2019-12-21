<?php

namespace Jonassiewertsen\Statamic\HowTo\Http\Controllers;

use Statamic\Facades\Blueprint;

class VideosController {
    public function index() {
        return 'cool';
    }

    public function create()
    {
        // Get an array of values from the item that you want to be populated
        // in the form. eg. ['title' => 'My Product', 'slug' => 'my-product']
//        $values = $product->toArray();

        // Get a blueprint. This might come from an actual blueprint yaml file
        // or even defined in this class. Read more about blueprints below.
        $blueprint = Blueprint::makeFromFields([
            'title' => [
                'type' => 'text',
                'validate' => 'required',
                'width' => 50,
            ],
            'handle' => [
                'type' => 'text',
                'validate' => 'required|alpha_dash',
                'width' => 50,
            ],
        ]);

        // Get a Fields object, a representation of the fields in a blueprint
        // that factors in imported fieldsets, config overrides, etc.
        $fields = $blueprint->fields();

        // Add the values to the object. This will let you do things like
        // validation, and processing, which is about to happen.
//        $fields = $fields->addValues($values);

        // Pre-process the values. This will convert the raw values into values
        // that the corresponding fieldtype vue components will be expecting.
//        $fields = $fields->preProcess();

        // You'll probably prefer chaining all of that.
        // $fields = $blueprint->fields()->addValues($values)->preProcess();

        // The vue component will need these three values at a minimum.

        return view('howToAddon::videos.create', [
            'blueprint' => $blueprint->toPublishArray(),
//            'values'    => $fields->values(),
//            'meta'      => $fields->meta(),
        ]);
    }
}