<?php

namespace ApiDQ\Factory;

use ApiDQ\Builder\ClientBuilder;
use ApiDQ\Client;
use ApiDQ\Exception\Client\BuilderException;
use Psr\Cache\CacheItemPoolInterface;

class SimpleClientFactory
{

    /**
     * @param string $apiUrl
     * @param string $apiToken
     * @return Client
     * @throws BuilderException
     */
    public static function createClient(string $apiUrl, string $apiToken): Client
    {
        return ClientBuilder::create()
            ->setApiUrl($apiUrl)
            ->setApiToken($apiToken)
            ->build();
    }

    /**
     * @param string $apiUrl
     * @param string $apiToken
     * @param CacheItemPoolInterface $cache
     * @return Client
     * @throws BuilderException
     */
    public static function createClientWithCache(
        string $apiUrl,
        string $apiToken,
        CacheItemPoolInterface $cache
    ): Client {
        return ClientBuilder::create()
            ->setApiUrl($apiUrl)
            ->setApiToken($apiToken)
            ->setCache($cache)
            ->build();
    }

    /**
     * @param string $apiUrl
     * @param string $apiToken
     * @param string $cacheDirPath
     * @return Client
     * @throws BuilderException
     */
    public static function createClientWithFileCache(
        string $apiUrl,
        string $apiToken,
        string $cacheDirPath
    ): Client {
        return ClientBuilder::create()
            ->setApiUrl($apiUrl)
            ->setApiToken($apiToken)
            ->setCacheDirPath($cacheDirPath)
            ->build();
    }
}
