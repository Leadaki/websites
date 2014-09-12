<?php

namespace Leadaki\Frontend\Service;

use Leadaki\Frontend\Model\AbstractItemInterface;
use Leadaki\Frontend\Model\Product;
use Leadaki\Frontend\Model\Promotion;
use Leadaki\Frontend\Model\Service;
use Leadaki\Frontend\Model\Site;

class LoadSiteDataService
{
    /** @var string */
    private $url;

    /** @var array */
    private $options;

    /** @var Site */
    private $site;

    public function __construct($url, $options = array())
    {
        $this->url = $url;

        $defaults = array(
            'cachePath' => '',
            'cacheValid' => 3600,
        );

        $this->options = array_merge($defaults, $options);

        $this->loadSiteData();
    }

    private function loadSiteData()
    {
        $this->checkCache();
        $this->processData($this->getRemoteData());
    }

    private function checkCache()
    {

    }

    private function getRemoteData()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept' => 'application/json',
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    private function processData($data)
    {
        $data = json_decode($data, true);
        $site = new Site();

        $siteReflectionClass = new \ReflectionClass($site);
        $thisReflectionClass = new \ReflectionClass($this);

        foreach ($data as $key => $value) {
            $camelCaseKey = $this->underscoreToCamelCase($key);
            if ($siteReflectionClass->hasProperty($camelCaseKey)) {
                if (!is_array($value)) {
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

        $this->setSite($site);
    }

    private function processProducts($products)
    {
        $items = array();
        foreach ($products as $product) {
            $item = new Product();
            $itemReflectionClass = new \ReflectionClass($item);
            foreach ($product as $key => $value) {
                $camelCaseKey = $this->underscoreToCamelCase($key);
                if (!is_array($value) && $itemReflectionClass->hasMethod('set' . ucfirst($camelCaseKey))) {
                    call_user_func(array($item, 'set' . ucfirst($camelCaseKey)), $value);
                }
            }
            $items[] = $item;
        }

        return $items;
    }

    public function processPromotions($promotions)
    {
        $items = array();
        foreach ($promotions as $promotion) {
            $item = new Promotion();
            $itemReflectionClass = new \ReflectionClass($item);
            foreach ($promotion as $key => $value) {
                $camelCaseKey = $this->underscoreToCamelCase($key);
                if (!is_array($value) && $itemReflectionClass->hasMethod('set' . ucfirst($camelCaseKey))) {
                    call_user_func(array($item, 'set' . ucfirst($camelCaseKey)), $value);
                }
            }
            $items[] = $item;
        }

        return $items;
    }

    public function processServices($services)
    {
        $items = array();
        foreach ($services as $service) {
            $item = new Service();
            $itemReflectionClass = new \ReflectionClass($item);
            foreach ($service as $key => $value) {
                $camelCaseKey = $this->underscoreToCamelCase($key);
                if (!is_array($value) && $itemReflectionClass->hasMethod('set' . ucfirst($camelCaseKey))) {
                    call_user_func(array($item, 'set' . ucfirst($camelCaseKey)), $value);
                }
            }
            $items[] = $item;
        }

        return $items;
    }

    /**
     * @param string $in
     *
     * @return string
     */
    public function underscoreToCamelCase($in)
    {
        $out = explode('_', $in);
        $out = array_map(function ($it) { return ucfirst($it); }, $out);
        $out[0] = strtolower($out[0]);
        $out = implode('', $out);

        return $out;
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
} 
