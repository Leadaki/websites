<?php

namespace Leadaki\Frontend\Model;

/**
 * Class Social
 *
 * @author Jesús Urrutia <me@jesusurrutia.com>
 *
 * @package Leadaki\Frontend\Model
 */
class Social
{
    /** @var string */
    private $twitter;

    /** @var string */
    private $facebook;

    /** @var string */
    private $googlePlus;

    /** @var string */
    private $pinterest;

    /**
     * @param string $facebook
     */
    public function setFacebook($facebook)
    {
        if (1 < substr_count($facebook, 'facebook.com')) {
            $facebook = preg_replace('#^https?://(?:www\.)?facebook.com/#', '', $facebook);
        }

        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $googlePlus
     */
    public function setGooglePlus($googlePlus)
    {
        if (1 < substr_count($googlePlus, 'plus.google.com')) {
            $googlePlus = preg_replace('#^https?://plus.google.com/\+#', '', $googlePlus, 1);
        }

        $this->googlePlus = $googlePlus;

        return $this;
    }

    /**
     * @return string
     */
    public function getGooglePlus()
    {
        return $this->googlePlus;
    }

    /**
     * @param string $pinterest
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;

        return $this;
    }

    /**
     * @return string
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * @param string $twitter
     */
    public function setTwitter($twitter)
    {
        if (1 < substr_count($twitter, 'twitter.com')) {
            $twitter = preg_replace('#^https?://(?:www\.)?twitter.com/#', '', $twitter, 1);
        }

        $this->twitter = $twitter;

        return $this;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }
}
