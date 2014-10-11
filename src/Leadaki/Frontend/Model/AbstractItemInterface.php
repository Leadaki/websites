<?php

namespace Leadaki\Frontend\Model;

/**
 * Interface AbstractItemInterface
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Model
 */
interface AbstractItemInterface
{
    /**
     * @param \DateTime $creationDate
     *
     * @return $this
     */
    public function setCreationDate($creationDate);

    /**
     * @return \DateTime
     */
    public function getCreationDate();

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $friendlyUri
     *
     * @return $this
     */
    public function setFriendlyUri($friendlyUri);

    /**
     * @return string
     */
    public function getFriendlyUri();

    /**
     * @param array $images
     *
     * @return $this
     */
    public function setImages($images);

    /**
     * @return array
     */
    public function getImages();

    /**
     * @param int $price
     *
     * @return $this
     */
    public function setPrice($price);

    /**
     * @return int
     */
    public function getPrice();

    /**
     * @param string $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle);

    /**
     * @return string
     */
    public function getSubtitle();

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $websiteId
     *
     * @return $this
     */
    public function setWebsiteId($websiteId);

    /**
     * @return string
     */
    public function getWebsiteId();
} 
