<?php
namespace Dotapi2\Util;

use Dotapi2\Exceptions\Exception;

/**
 * UserID Utility Class
 *
 * Credits for this implementation go to MuppetMaster42 from the Dota2 Forum.
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\Util
 */
class UserId
{

    /**
     * @const int
     */
    const SteamIdUpperBits = "00000001000100000000000000000001";

    /**
     * Conver 64-bit SteamID to 32-bit SteamID
     *
     * @param string|int $userId
     *
     * @return string
     * @throws Exception
     */
    public static function to32Bit($userId)
    {
        if (!function_exists('gmp_add')) {
            throw new Exception("GMP Library not installed. Cannot convert SteamIDs.");
        }

        return gmp_strval(gmp_sub($userId, gmp_mul(bindec(self::SteamIdUpperBits), "4294967296")));
    }

    /**
     * Convert 32-bit SteamID to 64-bit SteamID
     *
     * @param string|int $userId
     *
     * @return string
     * @throws Exception
     */
    public static function to64Bit($userId)
    {
        if (!function_exists('gmp_add')) {
            throw new Exception("GMP Library not installed. Cannot convert SteamIDs.");
        }

        return gmp_strval (gmp_add(gmp_mul(sprintf( "%u", self::SteamIdUpperBits), "4294967296" ), sprintf ("%u", $userId)));
    }

}
