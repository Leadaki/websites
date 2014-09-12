<?php

namespace Leadaki\Frontend\Model;

class AbstractItem implements AbstractItemInterface
{
    /** @var string */
    private $title;

    /** @var string */
    private $subtitle;

    /** @var integer */
    private $price;

    /** @var string */
    private $description;

    /** @var \DateTime */
    private $creationDate;

    /** @var array */
    private $images;

    /** @var string */
    private $friendlyUri;

    /** @var string */
    private $websiteId;

    /**
     * @param \DateTime $creationDate
     *
     * @return $this
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $friendlyUri
     *
     * @return $this
     */
    public function setFriendlyUri($friendlyUri)
    {
        $this->friendlyUri = $friendlyUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendlyUri()
    {
        return $this->friendlyUri;
    }

    /**
     * @param array $images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return array
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param int $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $subtitle
     *
     * @return $this
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $websiteId
     *
     * @return $this
     */
    public function setWebsiteId($websiteId)
    {
        $this->websiteId = $websiteId;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->websiteId;
    }
} 
