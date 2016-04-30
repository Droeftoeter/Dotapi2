<?php
namespace Dotapi2\Types;

/**
 * Lobby types used in Dota 2
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Types
 */
abstract class LobbyTypes {

    const INVALID           = -1;
    const PUBLIC_MATCH      = 0;
    const PRACTICE          = 1;
    const TOURNAMENT        = 2;
    const TUTORIAL          = 3;
    const COOP              = 4;
    const TEAM              = 5;
    const SOLO              = 6;

}
