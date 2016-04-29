# Dotapi2
[![Build Status](https://travis-ci.org/Sjaakmoes/Dotapi2.svg?branch=master)](https://travis-ci.org/Sjaakmoes/Dotapi2)
[![Dependency Status](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d)
[![Code Climate](https://codeclimate.com/github/Sjaakmoes/Dotapi2/badges/gpa.svg)](https://codeclimate.com/github/Sjaakmoes/Dotapi2)

Dota 2 API Wrapper for PHP

## Reference

 - [Installation](#installation)
 - [Configuration](#configuration)
 - [Supported Endpoints](#supported-endpoints)
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
$filter->setGameMode(GameModes::CaptainsMode);
$filter->setMinimumPlayers(10);
$filter->setAccountId(22785577);
$response = $client->getMatchHistory($filter);
```

### getMatchHistoryBySequenceNumber

Gets a list of matches ordered by sequence number

```php
$response = $client->getMatchHistoryBySequenceNumber(new Filters\MatchSequence(2040184605, 10));
```

### getMatchDetails

Gets detailed information about a specific match

```php
$response = $client->getMatchDetails(new Filters\MatchDetails(2328989387));
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
$response = $client->getItemIconPath(new Filters\ItemIconPath('enchanted_manglewood_staff', IconType::Large));
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

## Future Endpoints

 - getFantasyPlayerStats
 - getPlayerOfficialInfo
 - getBroadcasterInfo
 - getActiveTournamentList
 - getTeamInfo
 - getEventStatsForAccount
 - getRealTimeStats