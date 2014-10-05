<?php

namespace Leadaki\Frontend\Service;

class LoadUrlConfigService
{
    /** @var array */
    private $config;

    /** @var string */
    private $url;

    /** @var string */
    private $template;

    /** @var string */
    private $color;

    /** @var string */
    private $websiteId;

    public function __construct(array $config, $url)
    {
        $this->config = $config;
        $this->url = $url;

        $this->parseUrl();
    }

    private function parseUrl()
    {
        $input = array();
        parse_str(parse_url($this->url, PHP_URL_QUERY), $input);

        $this->template = $this->config['template']['id'] = isset($input['template'])
            ? $input['template']
            : null;
        ;
        $this->color = $this->config['template']['color'] = isset($input['color'])
            ? $input['color']
            : null
        ;
        $this->websiteId = $this->config['app']['website_id'] = isset($input['website_id'])
            ? $input['website_id']
            : $this->config['app']['website_id']
        ;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    public function getConfig()
    {
        return $this->config;
    }
} 
