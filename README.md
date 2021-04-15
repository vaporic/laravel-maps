# laravel-maps

[![Travis](https://img.shields.io/travis/Vaporic/laravel-maps.svg)](https://travis-ci.org/Vaporic/laravel-maps)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/Vaporic/laravel-maps.svg)](https://scrutinizer-ci.com/g/Vaporic/laravel-maps)
[![Coveralls](https://img.shields.io/coveralls/Vaporic/laravel-maps.svg)](https://coveralls.io/github/Vaporic/laravel-maps)
[![GitHub (pre-)release](https://img.shields.io/github/release/Vaporic/laravel-maps/all.svg)](https://github.com/Vaporic/laravel-maps)
[![Packagist](https://img.shields.io/packagist/dt/Vaporic/laravel-maps.svg)](https://packagist.org/packages/vaporic/laravel-maps)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/Vaporic/laravel-maps/master/LICENSE)

## Prerequisites
- PHP >= 7.3
- Laravel >= 8.0

**This package is the continuation of `Vaporic/Phpgmaps`. The move to the more appropriately-named package namespace is in preparation for a complete rewrite of the package, optimizing it for Laravel.**

# PhpGmaps
This repo aims to keep appitventures/phpgmaps alive, hopefully filling in temporarily until they make their repo
available again, or else continuing its maintenance going forward and keeping it working with future versions of
Laravel.

## Installation
Add the repo to composer.json under this new namespace:
```sh
composer require vaporic/laravel-maps
```

Add an environment variable with your Google Maps API Key in your `.env` file:
```
GOOGLE_MAPS_API_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
```

Lastly, add the following entry to your `\config\services.php` config file:
```php
    'google' => [
        'maps' => [
            'api-key' => env('GOOGLE_MAPS_API_KEY'),
        ],
    ],
```

### Example
The following code will prompt the user for access to their geolocation and then creates a map centered on their lat/lng

    Route::get('/', function(){
        $config = array();
        $config['center'] = 'auto';
        $config['onboundschanged'] = 'if (!centreGot) {
                var mapCentre = map.getCenter();
                marker_0.setOptions({
                    position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
                });
            }
            centreGot = true;';

        app('map')->initialize($config);

        // set up the marker ready for positioning
        // once we know the users location
        $marker = array();
        app('map')->add_marker($marker);

        $map = app('map')->create_map();
        echo "<html><head><script type="text/javascript">var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
    });

### More Examples
BIOINSTALL has a great website showing how to do all the things with the class. No reason to reinvent the wheel, so [here](http://biostall.com/demos/google-maps-v3-api-codeigniter-library/) it is. The only thing to note is that `$this->googlemaps` is now either the facade `Map::` or the app variable `app('map')`.
