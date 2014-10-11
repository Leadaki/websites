<?php

namespace Leadaki\Frontend\Service;

use Leadaki\Frontend\Factory\ItemFactory;
use Leadaki\Frontend\Factory\ObjectFactory;
use Leadaki\Frontend\Model\Image;
use Leadaki\Frontend\Model\Location;
use Leadaki\Frontend\Model\Site;
use Leadaki\Frontend\Model\Template;
use Leadaki\Frontend\Util\Util;

class LoadSiteDataService
{
    /** @var string */
    private $url;

    /** @var array */
    private $options;

    /** @var string */
    private $cacheName;

    /** @var string */
    private $cachePath;

    /** @var Site */
    private $site;

    /** @var array */
    private $data;

    /**
     * @param       $url
     * @param array $options
     */
    public function __construct($url, $options = array())
    {
        $this->url = $url;

        $defaults = array(
            'cacheFolder' => sys_get_temp_dir(),
            'cacheValid' => 3600,
        );

        $this->options = array_merge($defaults, $options);

        $this->cacheName = sprintf('%s.json', md5($this->url));
        $this->cachePath = sprintf('%s/%s', $this->options['cacheFolder'], $this->cacheName);

        $this->loadSiteData();
    }

    /**
     * Load site data
     */
    private function loadSiteData()
    {
        $this->processData($this->getRemoteData());
    }

    /**
     * Check if exist cache for request
     *
     * @return bool
     */
    private function hasCache()
    {
        if (file_exists(($this->cachePath))) {
            $mtime = filemtime($this->cachePath);

            if ($this->options['cacheValid'] > abs(time() - $mtime)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed|null|string
     */
    private function getRemoteData()
    {
        $response = null;

        if ($this->hasCache()) {
            $response = file_get_contents($this->cachePath);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept' => 'application/json',
            ));
            $response = curl_exec($ch);
            // -- Check if response is OK
            if (empty($response)) {
                if (file_exists($this->cachePath)) {
                    $response = file_get_contents($this->cachePath);
                } else {
                    throw new \Exception('Impossible obtain site data');
                }
            }

            // -- Save Cache
            file_put_contents($this->cachePath, $response);
            curl_close($ch);
        }

        // -- Check if response is valid
        if (!is_array(json_decode($response, true))) {
            throw new \Exception('Invalid data of site');
        }

        return $response;
    }

    /**
     * @param $data
     */
    private function processData($data)
    {
        $data = json_decode($data, true);
        $this->data = $data;

        $site = new Site();

        $siteReflectionClass = new \ReflectionClass($site);
        $thisReflectionClass = new \ReflectionClass($this);

        foreach ($data as $key => $value) {
            $camelCaseKey = Util::underscoreToCamelCase($key);
            if ($siteReflectionClass->hasProperty($camelCaseKey)) {
                if (!is_array($value)) {
                    call_user_func(array($site, 'set' . ucfirst($camelCaseKey)), $value);
                } else {
                    if(!Util::isAssoc($value) && !is_array(reset($value))) {
                        call_user_func(array($site, 'set' . ucfirst($camelCaseKey)), $value);
                    } else {
                        if ($thisReflectionClass->hasMethod('process' . ucfirst($camelCaseKey))) {
                            call_user_func(
                                array($site, 'set' . ucfirst($camelCaseKey)),
                                call_user_func(array($this, 'process' . ucfirst($camelCaseKey)), $value)
                            );
                        }
                    }
                }
            }
        }

        $this->setSite($site);
    }

    /**
     * @param $name
     * @param $items
     *
     * @return array
     */
    private function processItems($name, $items)
    {
        $objects = array();
        foreach ($items as $item) {
            $object = ItemFactory::create($name);
            if (null === $object) {
                continue;
            }
            $objectReflectionClass = new \ReflectionClass($object);
            foreach ($item as $key => $value) {
                $camelCaseKey = Util::underscoreToCamelCase($key);
                if (!is_array($value)) {
                    if ($objectReflectionClass->hasMethod('set' . ucfirst($camelCaseKey))) {
                        call_user_func(array($object, 'set' . ucfirst($camelCaseKey)), $value);
                    }
                } else {
                    if ('images' === $key) {
                        $object->setImages($this->processImages($value));
                    }
                }
            }
            $objects[] = $object;
        }

        return $objects;
    }

    /**
     * @param $items
     *
     * @return array
     */
    private function processProducts($items)
    {
        return $this->processItems('Product', $items);
    }

    /**
     * @param $items
     *
     * @return array
     */
    private function processPromotions($items)
    {
        return $this->processItems('Promotion', $items);
    }

    /**
     * @param $items
     *
     * @return array
     */
    private function processServices($items)
    {
        return $this->processItems('Service', $items);
    }

    /**
     * @param string $name
     * @param array $input
     *
     * @return Image|Location|Template|Video
     */
    private function processObjects($name, $input)
    {
        if (empty($input) || !is_array($input)) {
            return;
        }

        $object = ObjectFactory::create($name);
        $objectReflectionClass = new \ReflectionClass($object);
        foreach ($input as $key => $value) {
            $camelCaseProperty = Util::underscoreToCamelCase($key);
            if ($objectReflectionClass->hasMethod('set' . ucfirst($camelCaseProperty))) {
                call_user_func(array($object, 'set' . ucfirst($camelCaseProperty)), $value);
            }
        }

        return $object;
    }

    /**
     * Process a collection of objects
     *
     * @param string $name
     * @param array $input
     *
     * @return array
     */
    private function processCollectionObjects($name, $input)
    {
        if (empty($input) || !is_array($input)) {
            return;
        }

        $collection = array();
        foreach ($input as $item) {
            $collection[] = $this->processObjects($name, $item);
        }

        return $collection;
    }

    /**
     * @param $input
     *
     * @return array
     */
    private function processVideos($input)
    {
        return $this->processCollectionObjects('Video', $input);
    }

    /**
     * @param $input
     *
     * @return Location
     */
    private function processMainLocation($input)
    {
        return $this->processObjects('Location', $input);
    }

    /**
     * @param $input
     *
     * @return Template
     */
    private function processTemplate($input)
    {
        return $this->processObjects('Template', $input);
    }

    /**
     * @param array $input
     *
     * @return Image
     */
    private function processLogo(array $input)
    {
        return $this->processObjects('Image', $input);
    }

    /**
     * @param $input
     *
     * @return Social
     */
    private function processSocial($input)
    {
        return $this->processObjects('Social', $input);
    }

    /**
     * @param array $input
     *
     * @return array
     */
    private function processImages(array $input)
    {
        $images = array();
        foreach ($input as $item) {
            $images[] = $this->processObjects('Image', $item);
        }
        return $images;
    }

    /**
     * @param \Leadaki\Frontend\Model\Site $site
     *
     * @return $this
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * @return \Leadaki\Frontend\Model\Site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
} 
