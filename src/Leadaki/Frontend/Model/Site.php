<?php

namespace Leadaki\Frontend\Model;

use Leadaki\Frontend\Model\Image;

/**
 * Class Site
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Model
 */
class Site
{
    /** @var string */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $subtitle;

    /** @var string */
    private $email;

    /** @var string */
    private $phone;

    /** @var string */
    private $imagesPath;

    /** @var Image */
    private $logo;

    /** @var array */
    private $images;

    /** @var string */
    private $mainDescription;

    /** @var Template */
    private $template;

    /** @var Location */
    private $mainLocation;

    /** @var array */
    private $branches;

    /** @var array */
    private $benefits;

    /** @var array */
    private $social;

    /** @var string */
    private $url;

    /** @var array */
    private $videos;

    /** @var string */
    private $openHours;

    /** @var string */
    private $messageTranslations;

    /** @var string */
    private $customCss;

    /** @var string */
    private $customJavascript;

    /** @var string */
    private $companyId;

    /** @var  array */
    private $products;

    /** @var array */
    private $services;

    /** @var array */
    private $promotions;

    /** @var array */
    private $testimonials;

    /** @var array */
    private $clients;

    /**
     * @param array $benefits
     *
     * @return $this
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;

        return $this;
    }

    /**
     * @return array
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * @param array $branches
     *
     * @return $this
     */
    public function setBranches($branches)
    {
        $this->branches = $branches;

        return $this;
    }

    /**
     * @return array
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * @param array $clients
     *
     * @return $this
     */
    public function setClients($clients)
    {
        $this->clients = $clients;

        return $this;
    }

    /**
     * @return array
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param string $companyId
     *
     * @return $this
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $customCss
     *
     * @return $this
     */
    public function setCustomCss($customCss)
    {
        $this->customCss = $customCss;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomCss()
    {
        return $this->customCss;
    }

    /**
     * @param string $customJavascript
     *
     * @return $this
     */
    public function setCustomJavascript($customJavascript)
    {
        $this->customJavascript = $customJavascript;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomJavascript()
    {
        return $this->customJavascript;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @param string $imagesPath
     *
     * @return $this
     */
    public function setImagesPath($imagesPath)
    {
        $this->imagesPath = $imagesPath;

        return $this;
    }

    /**
     * @return string
     */
    public function getImagesPath()
    {
        return $this->imagesPath;
    }

    /**
     * @param \Leadaki\Frontend\Model\Image $logo
     *
     * @return $this
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return \Leadaki\Frontend\Model\Image
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $mainDescription
     *
     * @return $this
     */
    public function setMainDescription($mainDescription)
    {
        $this->mainDescription = $mainDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getMainDescription()
    {
        return $this->mainDescription;
    }

    /**
     * @param Location $mainLocation
     *
     * @return $this
     */
    public function setMainLocation($mainLocation)
    {
        $this->mainLocation = $mainLocation;

        return $this;
    }

    /**
     * @return Location
     */
    public function getMainLocation()
    {
        return $this->mainLocation;
    }

    /**
     * @param string $messageTranslations
     *
     * @return $this
     */
    public function setMessageTranslations($messageTranslations)
    {
        $this->messageTranslations = $messageTranslations;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageTranslations()
    {
        return $this->messageTranslations;
    }

    /**
     * @param string $openHours
     *
     * @return $this
     */
    public function setOpenHours($openHours)
    {
        $this->openHours = $openHours;

        return $this;
    }

    /**
     * @return string
     */
    public function getOpenHours()
    {
        return $this->openHours;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param array $products
     *
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param array $promotions
     *
     * @return $this
     */
    public function setPromotions($promotions)
    {
        $this->promotions = $promotions;

        return $this;
    }

    /**
     * @return array
     */
    public function getPromotions()
    {
        return $this->promotions;
    }

    /**
     * @param array $services
     *
     * @return $this
     */
    public function setServices($services)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param array $social
     *
     * @return $this
     */
    public function setSocial($social)
    {
        $this->social = $social;

        return $this;
    }

    /**
     * @return array
     */
    public function getSocial()
    {
        return $this->social;
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
     * @param Template $template
     *
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param array $testimonials
     *
     * @return $this
     */
    public function setTestimonials($testimonials)
    {
        $this->testimonials = $testimonials;

        return $this;
    }

    /**
     * @return array
     */
    public function getTestimonials()
    {
        return $this->testimonials;
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
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param array $videos
     *
     * @return $this
     */
    public function setVideos($videos)
    {
        $this->videos = $videos;

        return $this;
    }

    /**
     * @return array
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * @param Image  $image
     * @param string $options
     * @param string $extension
     *
     * @return string
     */
    public function generateImageUrl(Image $image, $options = '', $extension = 'png')
    {
        if (empty($options)) {
            return $image->getUrl();
        }

        return str_replace(
            array(
                '#OPTIONS#',
                '#ID#',
                '#EXTENSION#',
            ),
            array(
                $options,
                $image->getId(),
                $extension,
            ),
            $this->getImagesPath()
        );
    }

    /**
     * @param $slug
     *
     * @return Product
     */
    public function getProductBySlug($slug)
    {
        $product = null;

        foreach ($this->products as $item) {
            if ($item->getFriendlyUri() == $slug) {
                $product = $item;
                break;
            }
        }

        return $product;
    }

    /**
     * @param $slug
     *
     * @return Promotion
     */
    public function getPromotionBySlug($slug)
    {
        $promotion = null;

        foreach ($this->promotions as $item) {
            if ($item->getFriendlyUri() == $slug) {
                $promotion = $item;
                break;
            }
        }

        return $promotion;
    }

    /**
     * @param $slug
     *
     * @return Service
     */
    public function getServiceBySlug($slug)
    {
        $service = null;

        foreach ($this->services as $item) {
            if ($item->getFriendlyUri() == $slug) {
                $service = $item;
                break;
            }
        }

        return $service;
    }

    /**
     * @param $itemName
     * @param $slug
     *
     * @return Service|Product|Promotion
     */
    public function getItemBySlug($itemName, $slug)
    {
        $item = null;

        foreach ($this->$itemName as $el) {
            if ($el->getFriendlyUri() == $slug) {
                $item = $el;
                break;
            }
        }

        return $item;
    }
} 
