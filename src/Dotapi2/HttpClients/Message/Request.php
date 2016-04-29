<?php
namespace Dotapi2\HttpClients\Message;

/**
 * Request
 *
 * Simple wrapper around a HTTP request
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\HttpClients\Request
 */
class Request {

    /**
     * @var array headers
     */
    protected $headers;

    /**
     * @var string url
     */
    protected $url;

    /**
     * @var string method
     */
    protected $method;

    /**
     * @var array parameters
     */
    protected $parameters;

    /**
     * Constructor
     *
     * @param string $url
     * @param string $method
     * @param array $parameters
     * @param array $headers
     */
    public function __construct($url, $method = 'GET', array $parameters = [], array $headers = [])
    {
        $this->url = $url;
        $this->method = $method;
        $this->parameters = $parameters;
        $this->headers = $headers;
    }

    /**
     * Set the parameters
     * Replaces the old set of parameters if any
     *
     * @param array $parameters
     *
     * @return $this
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * Add a parameter to the set
     *
     * @param string $parameter
     * @param string $value
     *
     * @return $this
     */
    public function addParameter($parameter, $value)
    {
        $this->parameters[$parameter] = $value;
        return $this;
    }

    /**
     * Set the headers
     * Replaces the old set of headers if any
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * Add a header to the set
     *
     * @param string $header
     * @param string $value
     *
     * @return $this
     */
    public function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
        return $this;
    }

    /**
     * Get the URL
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Get the parameters
     *
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Get the headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

}
