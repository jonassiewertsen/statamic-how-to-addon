# Statamic How To Addon

Would you like to use less time to explain how your specific Statamic site has been build? This is your Addon then!

## How does it work?

First of all, you need to make screen recordings, on how your site works. This part only needs to be done once by 
yourself. I can't help you there.

Upload your videos, give them a name and maybe a short description if you want. The addon will display all videos nicely 
and your clients can watch those videos over and over again, by just logging onto the control panel. 

Your videos will be hosted by the client himself and he cant lose a link to them or anything similar. How great is that?

English and German translation is already provided, but you can easily add your own translation to the addon. 

## How does it look

<img src="https://github.com/jonassiewertsen/statamic-how-to-addon/blob/master/HowToAddon-index.png?raw=true" alt="How To Addon Overview">

<img src="https://github.com/jonassiewertsen/statamic-how-to-addon/blob/master/HowToAddon-show.png?raw=true" alt="How To Addon Single Video">

## Installation 

This addon works with **Statamic 3** only!

### Step 1

Install it via the composer command
```
composer require jonassiewertsen/statamic-how-to-addon
```

### Step 2

To setup up a Collection and Blueprints, fire the setup command.
If you do want to use your own collection and blueprint names, change those in the config file first :-)

```
php artisan howToAddon:setup
```

### Step 3
Permissions need to be set, to upload or change videos. 
- Super Users can do this by default
- If not a super user, remember to give permissions to the Videos Collection

Every logged in User can see and watch How To videos. You cant change that.

That's it. Enjoy!

## Tips

- If you want to order your videos, prefix them with a number: 00 General Informations, 01 How to edit pages  

## Customisation

To get you going as fast as possible, we did set up everything for you. Not a fan of it? Just change it.

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

### Photo used on Statamic Marketplace
The Photo has been taken by Jan-Christoph Elle Siewertsen. It is NOT allowed to use this photo without license. 
[Jan-Christoph Elle Siewertsen](http://janchristophelle.com/)
