<?php

namespace ApiDQ\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\ErrorResponse;
use League\Uri\Contracts\UriInterface;
use League\Uri\Uri;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 *
 */
abstract class AbstractResource
{
    /**
     * @var Uri BaseURL
     */
    protected Uri $uri;
    protected ClientInterface $httpClient;
    protected RequestFactoryInterface $requestFactory;
    protected StreamFactoryInterface $streamFactory;
    protected SerializerInterface $serializer;

    public function __construct(
        Uri $uri,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        SerializerInterface $serializer
    ) {
        $this->uri = $uri;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
        $this->serializer = $serializer;
    }

    /**
     * @param string $method
     * @param UriInterface $uri
     * @param mixed $body
     * @return RequestInterface
     */
    protected function createRequest(string $method, UriInterface $uri, $body): RequestInterface
    {
        return $this->requestFactory->createRequest($method, (string)$uri)
            ->withAddedHeader('Content-Type', 'application/json;charset=utf-8')
            ->withBody(
                $this->streamFactory->createStream(
                    $this->serializer->serialize($body, 'json')
                )
            );
    }

    /**
     * @param RequestInterface $request
     * @param string $responseClass
     * @return mixed
     * @throws ServiceException
     * @throws ClientExceptionInterface
     */
    protected function send(RequestInterface $request, string $responseClass)
    {
        $response = $this->httpClient->sendRequest($request);
        $body = $response->getBody()->getContents();
        if ($response->getStatusCode() >= 400) {
            /** @var ErrorResponse $errorResponse */
            $errorResponse = $this->serializer->deserialize($body, ErrorResponse::class, 'json');
            throw new ServiceException($errorResponse, $errorResponse->getMessage());
        }

        return $this->serializer->deserialize($body, $responseClass, 'json');
    }
}
