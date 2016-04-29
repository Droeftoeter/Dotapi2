<?php
namespace Dotapi2\Types;

/**
 * Game Modes used in Dota 2
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Types
 */
abstract class GameModes {

    const None                  = 0;
    const AllPick               = 1;
    const CaptainsMode          = 2;
    const RandomDraft           = 3;
    const SingleDraft           = 4;
    const AllRandom             = 5;
    const Intro                 = 6;
    const Diretide              = 7;
    const ReverseCaptainsMode   = 8;
    const TheGreeviling         = 9;
    const Tutorial              = 10;
    const MidOnly               = 11;
    const LeastPlayed           = 12;
    const NewPlayerPool         = 13;
    const Compendium            = 14;
    const CaptainsDraft         = 15;

}
