<?php

namespace Leadaki\Frontend\Model;

class Video
{
    /** @var string */
    private $title;

    /** @var string */
    private $url;

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

    public function isYoutube()
    {
        if (empty($this->url)) {
            return false;
        }

        return false !== strpos($this->url, 'youtu');
    }

    public function getYoutubeId()
    {
        if (!$this->isYoutube()) {
            return;
        }

        return preg_replace('#^https?://(?:www\.)?youtu\.?be(?:\.com)?/(?:watch\?v=)?(.+)#', '$1', $this->url);
    }
} 
