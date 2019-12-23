# Statamic How To Addon

Would like to use less time to explain how your specific Statamic site has been build? This is your Addon then!

## How it works?

First of all you need to make screen recordings, on how your site works. This part only needs to be done once by yourself. I cant help your there.

Upload your videos, give them a name and maybe a short description if you want. The addon will display the all videos
nicely and your clients can watch those videos over and over again, by just logging into the page. 

Your videos will be hosted by the client himself and he cant loose a link to them or similar. How great is that?

English and German translation is already provided, but you can easily add your own translations to the addon. 

## How does it look

<img src="https://github.com/jonassiewertsen/statamic-how-to-addon/blob/master/HowToAddon-index.png?raw=true" alt="How To Addon Overview">

<img src="https://github.com/jonassiewertsen/statamic-how-to-addon/blob/master/HowToAddon-show.png?raw=true" alt="How To Addon Single Video">

## Installation 

This Fieldtype works with **Statamic 3** only!

Install it via the composer command
```
composer require jonassiewertsen/statamic-how-to-addon
```

To setup up a Collection and Blueprints, fire the setup command.
If you do want to use your own collection and blueprint names, change those in the config file first :-)

```
php artisan howToAddon:setup
```

That's it. Enjoy!

## Tips

- If you want to order your videos, prefix them with a number: 00 General Informations, 01 How to edit pages  

## Customisation

To get you going as fast as possible, we did setup everything for you. Not a fan of it? Just change it.

### Language / Translation

German or English isn't the correct language? Add your own translations (You would make me happy, to provide me your translations)

```php
php artisan vendor:publish
```

Select the Addon from the list
```
Provider: Jonassiewertsen\Statamic\HowTo\ServiceProvider
```

All the translation files have been added into your resources/lang/vendor/jonassiewertsen/howToAddon/
Change the files or add your own language.

### Collection and Blueprint names

You can choose other names. Just publish the vendor files

```php
php artisan vendor:publish
```

You can change the names in the config file, which have been copied into your config directory.

## License
This Statamic How To Addon is licensed under the MIT license.
