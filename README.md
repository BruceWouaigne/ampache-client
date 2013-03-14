[![Build Status](https://travis-ci.org/BruceWouaigne/ampache-client.png)](https://travis-ci.org/BruceWouaigne/ampache-client)

Installation
============

1. Clone this repository
2. Install dependencies with `composer.phar install --prefer-dist`
3. Start playing!

Usage
=====

```php
<?php

require './vendor/autoload.php';

use Ampache\ApiClient;

$client = new ApiClient(/** Ampache base url **/); // Something like 'http://localhost/ampache'

$client->processLogin('AmpacheLogin', 'AmpachePassword');

$artistCollection = $client->request('artists'); // Will return an array of \Ampache\Model\Artist
$artistCollection = $client->request('artists', array('filter' => 'nonexistent artist')); // Will return an empty array
$singleArtist     = $client->request('artist', array('filter' => 1)); // Will return an \Ampache\Model\Artist or null if not exists

// The 'request' method can be called for any Ampache api method. See http://ampache.org/wiki/dev:xmlapi
```
