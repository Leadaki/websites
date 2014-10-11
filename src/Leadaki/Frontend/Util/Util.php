<?php

namespace Leadaki\Frontend\Util;

/**
 * Class Util
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Util
 */
class Util
{
    /**
     * @param string $in
     *
     * @return string
     */
    public static function underscoreToCamelCase($in)
    {
        $out = explode('_', $in);
        $out = array_map(function ($it) { return ucfirst($it); }, $out);
        $out[0] = strtolower($out[0]);
        $out = implode('', $out);

        return $out;
    }

    /**
     * @param array $input
     *
     * @return bool
     */
    public static function isAssoc(array $input)
    {
        return (bool)count(array_filter(array_keys($input), 'is_string'));
    }
} 
