<?php
namespace Dotapi2\HttpClients;

use Dotapi2\Exceptions\InvalidKeyException;
use Dotapi2\Exceptions\RequestException;
use Dotapi2\HttpClients\Message\Request;
use Dotapi2\HttpClients\Message\Response;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

/**
 * Guzzle HttpClient
 *
 * @author Freek Post <freek@kobalt.blue>
 * @package Dotapi2\HttpClients
 */
class Guzzle implements HttpClientInterface {

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var array options
     */
    protected $options = [
        'user_agent'    => 'PHP-Dotapi2',
        'timeout'       => 20
    ];

    /**
     * @var Response|null
     */
    protected $lastResponse;

    /**
     * @var Request|null
     */
    protected $lastRequest;

    /**
     * Constructor
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->options, $options);
        $this->client = new Client($this->options);
    }

    /**
     * {@inheritDoc}
     */
    public function send(Request $request)
    {
        $guzzleRequest = $this->convertToGuzzleRequest($request);

        try {
            $response = $this->client->send($guzzleRequest, ['query' => $request->getParameters()]);
        } catch(ClientException $e){
            if($e->getResponse()->getStatusCode() == 403){
                throw new InvalidKeyException("No Steam WebAPI key has been provided, or the provided key is invalid.");
            }
            throw new RequestException("Something went wrong while accessing the Steam API.", 0, $e);
        } catch(TransferException $e){
            throw new RequestException("Something went wrong while accessing the Steam API.", 0, $e);
        }

        $this->lastRequest = $request;
        $this->lastResponse = new Response($response->getBody(), $response->getStatusCode(), $response->getHeaders(), $request, $this);
        return $this->lastResponse;
    }

    /**
     * {@inheritDoc}
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * Get the last request
     *
     * @return Request|null
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * Convert Dotapi2 request to Guzzle request
     *
     * @param Request $request
     *
     * @return GuzzleRequest
     */
    protected function convertToGuzzleRequest(Request $request)
    {
        return new GuzzleRequest($request->getMethod(), $request->getUrl(), $request->getHeaders());
    }


}
