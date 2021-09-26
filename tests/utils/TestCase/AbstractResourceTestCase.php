<?php

namespace ApiDQ\TestUtils\TestCase;

use ApiDQ\Builder\SerializerBuilder;
use ApiDQ\TestUtils\TestConfig;
use Http\Discovery\Psr17FactoryDiscovery;
use InvalidArgumentException;
use League\Uri\Uri;
use PHPUnit\Framework\TestCase;
use Pock\PockBuilder;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Serializer\Serializer;

class AbstractResourceTestCase extends TestCase
{
    protected static Serializer $serializer;
    protected static Uri $uri;
    protected static ClientInterface $httpClient;
    protected static RequestFactoryInterface $requestFactory;
    protected static ResponseFactoryInterface $responseFactory;
    protected static StreamFactoryInterface $streamFactory;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        static::$serializer = (new SerializerBuilder())->build();
        static::$responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        static::$streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        static::$requestFactory = Psr17FactoryDiscovery::findRequestFactory();
    }

    /**
     * @param string $pathFragment
     *
     * @return PockBuilder
     */
    protected static function createApiMockBuilder(string $pathFragment): PockBuilder
    {
        return (new PockBuilder())
            ->matchScheme((string)parse_url(TestConfig::getApiUrl(), PHP_URL_SCHEME))
            ->matchHost((string)parse_url(TestConfig::getApiUrl(), PHP_URL_HOST))
            ->matchHeader('Authorization', TestConfig::getApiToken())
            ->matchPath($pathFragment);
    }

    /**
     * @param int $code
     * @param object|mixed[]|string $response
     *
     * @return ResponseInterface
     * @throws InvalidArgumentException
     */
    protected static function responseJson(int $code, $response): ResponseInterface
    {
        $data = null;

        switch (gettype($response)) {
            case 'string':
                $data = static::$streamFactory->createStream((string)$response);
                break;
            case 'array':
            case 'object':
                $data = static::$streamFactory->createStream(static::$serializer->serialize($response, 'json'));
                break;
            default:
                throw new InvalidArgumentException(
                    sprintf(
                        'Expected string, object, or array, got "%s"',
                        gettype($response)
                    )
                );
        }

        return static::$responseFactory->createResponse($code)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($data);
    }
}
