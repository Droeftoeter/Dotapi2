# Dotapi2
[![Build Status](https://travis-ci.org/Sjaakmoes/Dotapi2.svg?branch=master)](https://travis-ci.org/Sjaakmoes/Dotapi2)
[![Dependency Status](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5723bcb6ba37ce0031fc1f6d)
[![Test Coverage](https://codeclimate.com/github/Sjaakmoes/Dotapi2/badges/coverage.svg)](https://codeclimate.com/github/Sjaakmoes/Dotapi2/coverage)
[![Code Climate](https://codeclimate.com/github/Sjaakmoes/Dotapi2/badges/gpa.svg)](https://codeclimate.com/github/Sjaakmoes/Dotapi2)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/51265f11-7c1b-4129-aeb2-764cd64d452e/mini.png)](https://insight.sensiolabs.com/projects/51265f11-7c1b-4129-aeb2-764cd64d452e)

Dota 2 API Wrapper for PHP

## Reference

 - [Installation](#installation)
 - [Configuration](#configuration)
 - [Supported Endpoints](#supported-endpoints)
  - [getMatchHistory](#getmatchhistory)
  - [getMatchHistoryBySequenceNumber](#getmatchhistorybysequencenumber)
  - [getMatchDetails](#getmatchdetails)
  - [getLeagueListing](#getleaguelisting)
  - [getLiveLeagueGames](#getliveleaguegames)
  - [getScheduledLeagueGames](#getscheduledleaguegames)
  - [getFantasyPlayerStats](#getfantasyplayerstats)
  - [getPlayerOfficialInfo](#getplayerofficialinfo)
  - [getBroadcasterInfo](#getbroadcasterinfo)
  - [getActiveTournamentList](#getactivetournamentlist)
  - [getTeamInfo](#getteaminfo)
  - [getTopLiveGame](#gettoplivegame)
  - [getEventStatsForAccount](#geteventstatsforaccount)
  - [getRealTimeStats](#getrealtimestats)
  - [getGameItems](#getgameitems)
  - [getItemIconPath](#getitemiconpath)
  - [getSchemaUrl](#getschemaurl)
  - [getHeroes](#getheroes)
  - [getRarities](#getrarities)
  - [getTournamentPrizePool](#gettournamentprizepool)
 - [Steam ID Conversion](#steam-id-conversion)

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

// Get Dire players
$direPlayers = $match->getPlayers()->getDire();

// Get a specific player
$specificPlayer = $match->getPlayers()->getById(22785577);
$specificPlayerHero = $specificPlayer->getHeroId();
$specificPlayerKills = $specificPlayer->getKills();

// Get Picks and Bans sequence if matchtype has picks and bans
$pickBanSequence = $match->getPicksBans();
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

### getFantasyPlayerStats

Get fantasy player stats

```php
// Puppey (87278757) in The Shanghai Major (4266)
$response = $client->getFantasyPlayerStats(new Filters\FantasyPlayerStats(4266, 87278757));
```

### getPlayerOfficialInfo

Get official player information.

```php
// Puppey (87278757)
$response = $client->getPlayerOfficialInfo(new Filters\AccountId(87278757));
```

### getBroadcasterInfo

Get broadcaster info with the 64-bit Steam ID.
If you need to convert, check [Steam ID Conversion](#steam-id-conversion).

```php
// Requires the 64-bit Steam ID of a broadcaster.
$response = $client->getBroadcasterInfo(new Filters\BroadcasterInfo(76561197997412731));
```

### getActiveTournamentList

Gets list of active tournament

```php
$response = $client->getActiveTournamentList();
```

### getTeamInfo

Get team info

```php
// Get team info for Team Secret (1838315). Filter is optional.
$response = $client->getTeamInfo(new Filters\TeamInfo(1838315));
```

### getTopLiveGame

Get the top live games.

```php
$response = $client->getTopLiveGame(new Filters\TopLiveGame(0));
```

### getEventStatsForAccount

Retrieve event statistics for account.

```php
// Get stats for account 22785577 at The Shanghai Major (4266)
$response = $client->getEventStatsForAccount(new Filters\EventStats(4266, 22785577));
```

### getRealTimeStats

Retrieve real time stats about a match with a server steam id.
You need a steam server id to get statistics, the top live games and some other tournament endpoint provide these for a match.

```php
$response = $client->getRealTimeStats(new Filters\RealTimeStats(steam_server_id_here));
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


