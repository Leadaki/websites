<?php

namespace Leadaki\Frontend\Factory;

use Leadaki\Frontend\Model\Image;
use Leadaki\Frontend\Model\Location;
use Leadaki\Frontend\Model\Social;
use Leadaki\Frontend\Model\Template;
use Leadaki\Frontend\Model\Video;

/**
 * Class ObjectFactory
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Factory
 */
class ObjectFactory
{
    /**
     * @param $name
     *
     * @return Image|Location|Template|Video|Social
     * @throws \InvalidArgumentException
     */
    public static function create($name)
    {
        switch ($name) {
            case 'Location':
                return new Location();
            case 'Image':
                return new Image();
            case 'Template':
                return new Template();
            case 'Video':
                return new Video();
            case 'Social':
                return new Social();
            default:
                throw new \InvalidArgumentException('Class not exists');
        }
    }
} 
