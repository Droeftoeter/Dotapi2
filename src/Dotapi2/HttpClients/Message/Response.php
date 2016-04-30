<?php
namespace Dotapi2\HttpClients\Message;

use Dotapi2\Collection\CollectionFactory;
use Dotapi2\Collection\Collection;
use Dotapi2\Entity\Entity;
use Dotapi2\Entity\EntityFactory;
use Dotapi2\HttpClients\HttpClientInterface;
use Dotapi2\Exceptions\Exception;

/**
 * HTTP Response
 *
 * Simple wrapper around a HTTP response
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\HttpClients\Message
 */
class Response {

    /**
     * @var int status code
     */
    protected $statusCode;

    /**
     * @var array headers
     */
    protected $headers;

    /**
     * @var string body
     */
    protected $body;

    /**
     * @var array
     */
    protected $json;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var HttpClientInterface
     */
    protected $client;

    /**
     * Constructor
     *
     * @param string $body
     * @param int $statusCode
     * @param array $headers
     * @param Request $request
     * @param HttpClientInterface $client
     */
    public function __construct($body, $statusCode, array $headers, Request $request, HttpClientInterface $client)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->body = $body;
        $this->request = $request;
        $this->client = $client;

        // Try to decode
        $json = json_decode($this->body, true);
        if(json_last_error() === JSON_ERROR_NONE){
            $this->json = $json;
        }
    }

    /**
     * Get the HttpClient which made the request resulting in this response
     *
     * @return HttpClientInterface
     */
    public function getHttpClient()
    {
        return $this->client;
    }

    /**
     * Get the associated request
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the HTTP status code received with this response
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Get the headers received with this response
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Get the body received with this response
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Check if the body is JSON encoded
     *
     * @return bool
     */
    public function isJson()
    {
        return is_array($this->json);
    }

    /**
     * Get JSON data
     *
     * @return array
     */
    public function getJson()
    {
        return ($this->isJson()) ? $this->json : [];
    }

    /**
     * Get result JSON data
     *
     * @return array
     */
    public function getResult()
    {
        return ($this->isJson() && isset($this->json['result'])) ? $this->json['result'] : [];
    }

    /**
     * Get collection from response.
     *
     * @param string $collectionType
     *
     * @return Collection
     * @throws Exception
     */
    public function getCollection($collectionType)
    {
        $collectionFactory = new CollectionFactory();
        return $collectionFactory->create($collectionType, $this->getResult());
    }

    /**
     * Get entity from response
     *
     * @param string $entityType
     *
     * @return Entity
     * @throws Exception
     */
    public function getEntity($entityType)
    {
        $entityFactory = new EntityFactory();
        return $entityFactory->create($entityType, $this->getResult());
    }

}

