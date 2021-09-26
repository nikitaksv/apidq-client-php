<?php

namespace ApiDQ\TestUtils\Factory;

use ApiDQ\Builder\ClientBuilder;
use ApiDQ\Client;
use ApiDQ\Exception\Client\BuilderException;
use ApiDQ\TestUtils\TestConfig;
use Psr\Http\Client\ClientInterface;

class TestClientFactory
{
    /**
     * @param ClientInterface $client
     * @return Client
     * @throws BuilderException
     */
    public static function createClient(ClientInterface $client): Client
    {
        return ClientBuilder::create()
            ->setApiUrl(TestConfig::getApiUrl())
            ->setApiToken(TestConfig::getApiToken())
            ->setClient($client)
            ->build();
    }
}
