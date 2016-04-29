<?php
namespace Dotapi2\Types;

/**
 * Lobby types used in Dota 2
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Types
 */
abstract class LobbyTypes {

    const Invalid           = -1;
    const PublicMatch       = 0;
    const Practice          = 1;
    const Tournament        = 2;
    const Tutorial          = 3;
    const Coop              = 4;
    const Team              = 5;
    const Solo              = 6;

}
