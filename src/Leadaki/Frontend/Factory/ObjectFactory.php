<?php

namespace Leadaki\Frontend\Factory;

use Leadaki\Frontend\Model\Image;
use Leadaki\Frontend\Model\Location;
use Leadaki\Frontend\Model\Template;

/**
 * Class ObjectFactory
 *
 * @package Leadaki\Frontend\Factory
 */
class ObjectFactory
{
    /**
     * @param $name
     *
     * @return Image|Location|Template
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
            default:
                throw new \InvalidArgumentException('Class not exists');
        }
    }
} 
