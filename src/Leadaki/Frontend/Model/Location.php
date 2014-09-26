<?php

namespace Leadaki\Frontend\Model;

/**
 * Class Location
 *
 * @package Leadaki\Frontend\Model
 */
class Location
{
    /** @var string */
    private $googleMapsAddress;

    /** @var string */
    private $address;

    /** @var string */
    private $name;

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $googleMapsAddress
     *
     * @return $this
     */
    public function setGoogleMapsAddress($googleMapsAddress)
    {
        $this->googleMapsAddress = $googleMapsAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getGoogleMapsAddress()
    {
        return $this->googleMapsAddress;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
} 
