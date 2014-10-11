<?php

namespace Leadaki\Frontend\Factory;

use Leadaki\Frontend\Model\AbstractItemInterface;
use Leadaki\Frontend\Model\Product;
use Leadaki\Frontend\Model\Promotion;
use Leadaki\Frontend\Model\Service;

/**
 * Class ItemFactory
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Factory
 */
class ItemFactory
{
    /**
     * @param $itemName
     *
     * @return AbstractItemInterface|null
     */
    public static function create($itemName)
    {
        $instance = null;

        switch ($itemName) {
            case 'Product':
                $instance = new Product();
                break;
            case 'Promotion':
                $instance = new Promotion();
                break;
            case 'Service':
                $instance = new Service();
                break;
        }

        return $instance;
    }
} 
