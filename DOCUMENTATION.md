# How does it work?

First of all, you need to make screen recordings on how your site works. This part only needs to be done once by yourself. I can't help you there.

Upload your videos, give them a name, and maybe a short description if you want. The addon will display all videos nicely and your clients can watch those videos over and over again by just logging onto the control panel.

Your videos will be hosted by the client himself, so he can't lose a link to them or anything similar. How great is that?

English and German translation is provided already, but you can easily add your own translation.

# Installation 

This addon works with **Statamic 3** only!

## Step 1

Install it via the composer command
```
composer require jonassiewertsen/statamic-how-to-addon
```

## Step 2

To setup up a Collection and Blueprints, fire the setup command.
If you do want to use your own collection and blueprint names, change those in the config file first :-)

```
php artisan howToAddon:setup
```

## Step 3
Permissions need to be set, to upload or change videos. 
- Super Users can do this by default
- If not a super user, remember to give permissions to the Videos Collection

All logged in user can see and watch How To videos. You cant change that at the moment. Let me know if you need this functionality.

That's it. Enjoy!

# Tips

- If you want to order your videos, prefix them with a number: 00 General Informations, 01 How to edit pages  

## 

# Customization

To get you going as fast as possible, we did set up everything for you. Not a fan of it? Just change it.

## Language / Translation

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

## Footer created by reference

If you want, you can easily disable the reference in the config file. Publish the file and set
the value to false.

```php
php artisan vendor:publish
```

## Collection and Blueprint names

You can choose other names. Just publish the vendor files

```php
php artisan vendor:publish
```

You can change the names in the config file, which have been copied into your config directory.

# License
This Statamic How To Addon is licensed under the proprietary license. For use this addon in production, you need 
to buy a license:
[Statamic Marketplace](https://statamic.com/seller/products/how-to-addon/variants/219/preview)

# Photo used on Statamic Marketplace
The Photo has been taken by Jan-Christoph Elle Siewertsen. It is NOT allowed to use this photo without license. 
[Jan-Christoph Elle Siewertsen](http://janchristophelle.com/)
