<?php

namespace Leadaki\Frontend\Model;

/**
 * Class Template
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Model
 */
class Template
{
    const TEMPLATE_DEFAULT_ID = self::TEMPLATE_ID_MODERN;
    const TEMPLATE_DEFAULT_COLOR = self::TEMPLATE_COLOR_RED;

    const TEMPLATE_ID_APPAREL = 'apparel';
    const TEMPLATE_ID_BASIC = 'basic';
    const TEMPLATE_ID_MODERN = 'modern';
    const TEMPLATE_ID_MOTORS = 'motors';
    const TEMPLATE_ID_PIXMA = 'pixma';

    const TEMPLATE_COLOR_BLUE = 'blue';
    const TEMPLATE_COLOR_BROWN = 'brown';
    const TEMPLATE_COLOR_GOLDEN = 'golden';
    const TEMPLATE_COLOR_GRAY = 'gray';
    const TEMPLATE_COLOR_GREEN = 'green';
    const TEMPLATE_COLOR_MAGENTA = 'magenta';
    const TEMPLATE_COLOR_ORANGE = 'orange';
    const TEMPLATE_COLOR_PURPLE = 'purple';
    const TEMPLATE_COLOR_RED = 'red';
    const TEMPLATE_COLOR_TEAL = 'teal';

    /** @var array */
    private static $availableIds;

    /** @var array */
    private static $availableColors;

    /** @var string */
    private $id;

    /** @var string */
    private $color;

    /**
     * Initialize with default id and color
     */
    public function __construct()
    {
        $this->id = self::TEMPLATE_DEFAULT_ID;
        $this->color = self::TEMPLATE_DEFAULT_COLOR;
    }

    /**
     * Set color of site
     * Available: blue|brown|golden|gray|green|magenta|orange|purple|red|teal
     *
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        if (in_array($color, self::getAvailableColors())) {
            $this->color = $color;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set template id
     * Available: apparel|basic|modern|motors|pixma
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        if (in_array($id, self::getAvailableIds())) {
            $this->id = $id;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public static function getAvailableIds()
    {
        if (!empty(self::$availableIds)) {
            return self::$availableIds;
        }

        $rc = new \ReflectionClass(__CLASS__);
        $constants = $rc->getConstants();

        $ids = array();
        foreach ($constants as $key => $item)
        {
            if (0 === strpos($key, 'TEMPLATE_ID')) {
                $ids[] = $item;
            }
        }

        self::$availableIds = $ids;

        return self::$availableIds;
    }

    public static function getAvailableColors()
    {
        if (!empty(self::$availableColors)) {
            return self::$availableColors;
        }

        $rc = new \ReflectionClass(__CLASS__);
        $constants = $rc->getConstants();

        $colors = array();
        foreach ($constants as $key => $item)
        {
            if (0 === strpos($key, 'TEMPLATE_COLOR')) {
                $colors[] = $item;
            }
        }

        self::$availableColors = $colors;

        return self::$availableColors;
    }
} 
