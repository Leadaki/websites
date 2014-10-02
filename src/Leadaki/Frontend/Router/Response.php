<?php

namespace Leadaki\Frontend\Router;

/**
 * Class Response
 *
 * @package Leadaki\Frontend\Router
 */
class Response
{
    /** @var string */
    private $body;

    /** @var int */
    private $code;

    /** @var array */
    private $headers;

    public function __construct($body, $code = ResponseInterface::HTTP_OK, $headers = array())
    {
        $this->body = $body;
        $this->code = $code;
        $this->headers = $headers;
    }

    /**
     * @param string $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param int $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
} 
