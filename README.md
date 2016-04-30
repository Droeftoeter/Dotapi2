# Dotapi2
[![Build Status](https://travis-ci.org/Sjaakmoes/Dotapi2.svg?branch=master)](https://travis-ci.org/Sjaakmoes/Dotapi2)
[![Dependency Status](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d)
[![Test Coverage](https://codeclimate.com/github/Sjaakmoes/Dotapi2/badges/coverage.svg)](https://codeclimate.com/github/Sjaakmoes/Dotapi2/coverage)
[![Code Climate](https://codeclimate.com/github/Sjaakmoes/Dotapi2/badges/gpa.svg)](https://codeclimate.com/github/Sjaakmoes/Dotapi2)

Dota 2 API Wrapper for PHP

## Reference

 - [Installation](#installation)
 - [Configuration](#configuration)
 - [Supported Endpoints](#supported-endpoints)
 - [Steam ID Conversion](#steam-id-conversion)
 - [Future Endpoints](#future-endpoints)

## Installation

This module can be installed with [Composer](https://getcomposer.org/).
Add the dotapi2 package to your ```composer.json``` file:

```json
{
    "require": {
        "sjaakmoes/dotapi2": "~1.0"
    }
}
```

You will also need a Steam API key, you can get one at [http://steamcommunity.com/dev/apikey](http://steamcommunity.com/dev/apikey).

## Configuration

```php
// Set your Steam API key
Client::setDefaultKey('your_api_key_here');

// Create wrapper
$client = new Client();
```

## Supported Endpoints

### getMatchHistory

Gets a filtered match history

```php
$filter = new Filters\Match();
$filter->setGameMode(GameModes::CAPTAINS__MODE);
$filter->setMinimumPlayers(10);
$filter->setAccountId(22785577);

// Returns a Response object that contains the raw body and JSON data.
$response = $client->getMatchHistory($filter);

// Turns response into a Match collection
$matchCollection = $response->getCollection('Match');

// Loops through all the found matches and dispays the start time.
foreach ($matchCollection as $match) {
    echo $match->getStartTime()->format('d-m-Y H:i:s') . PHP_EOL;
}
```

### getMatchHistoryBySequenceNumber

Gets a list of matches ordered by sequence number

```php

// Returns a Response object that contains the raw body and JSON data.
$response = $client->getMatchHistoryBySequenceNumber(new Filters\MatchSequence(2040184605, 10));

// Turns response into a Match collection
$matchCollection = $response->getCollection('Match');

// Loops through all the found matches and dispays the start time.
foreach ($matchCollection as $match) {
    echo $match->getStartTime()->format('d-m-Y H:i:s') . PHP_EOL;
}
```

### getMatchDetails

Gets detailed information about a specific match

```php

// Returns a Response object that contains the raw body and JSON data.
$response = $client->getMatchDetails(new Filters\MatchDetails(2197925777));

// Turns response into a DetailedMatch collection
$match = $response->getEntity('DetailedMatch');

// Echo start time, player count and the amount of kills the first player made.
echo $match->getStartTime()->format('d-m-Y H:i:s') . PHP_EOL;
echo $match->getPlayers()->count() . PHP_EOL;
echo $match->getPlayers()->first()->getKills() . PHP_EOL;
```

### getLeagueListing

Get information about DotaTV-supported leagues.

```php
$response = $client->getLeagueListing();
```

### getLiveLeagueGames

Get a list of in-progress league matches, as well as details of that match as it unfolds.

```php
$response = $client->getLiveLeagueGames();
```

### getScheduledLeagueGames

Get a list of scheduled league games coming up.

```php
$response = $client->getScheduledLeagueGames();
```

### getTopLiveGame

Get the top live games.

```php
$response = $client->getTopLiveGame(new Filters\TopLiveGame(0));
```

### getGameItems

Get a list of Dota2 in-game items.

```php
$response = $client->getGameItems();
```

### getItemIconPath

Get the CDN path for a specific icon.

```php
$response = $client->getItemIconPath(new Filters\ItemIconPath('enchanted_manglewood_staff', IconType::LARGE));
```

### getSchemaUrl

Get the URL to the latest schema for Dota 2.

```php
$response = $client->getSchemaUrl();
```

### getHeroes

Get a list of heroes.

```php
$response = $client->getHeroes();
```

### getRarities

Get item rarity list.

```php
$response = $client->getRarities();
```

### getTournamentPrizePool

Get the current pricepool for specific tournaments.

```php
$response = $client->getTournamentPrizePool();
```

### Custom endpoint

You can also contact a custom endpoint on the Steam API:

```php
$response = $client->get('IEconDOTA2_570/GetGameItems/v1', array|Filters\Filter $parameters);
```

## Steam ID Conversion

If you have the [GMP](http://php.net/manual/en/intro.gmp.php) extension installed, Dotapi2 will allow you to convert 32-bit to 64-bit ID's and the other way around.

To convert a 32-bit ID:

```php
$steamId = UserId::to64Bit('22785577'); // 76561197983051305
```

To convert a 64-bit ID:

```php
$accountId = UserId::to32Bit('76561197983051305'); // 22785577
```

## Future Endpoints

 - getFantasyPlayerStats
 - getPlayerOfficialInfo
 - getBroadcasterInfo
 - getActiveTournamentList
 - getTeamInfo
 - getEventStatsForAccount
 - getRealTimeStats

