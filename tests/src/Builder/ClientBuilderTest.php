<?php

namespace ApiDQ\Tests\Builder;

use ApiDQ\Builder\ClientBuilder;
use ApiDQ\Client;
use ApiDQ\Exception\Client\BuilderException;
use ApiDQ\Model\Logger;
use ApiDQ\TestUtils\TestConfig;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class ClientBuilderTest extends TestCase
{
    public function testValidate(): void
    {
        try {
            ClientBuilder::create()->build();
            self::fail('not exception');
        } catch (BuilderException $e) {
            self::assertEquals('The "apiUrl" parameter is required', $e->getMessage());
        }
        try {
            ClientBuilder::create()->setApiUrl(TestConfig::getApiUrl())->build();
            self::fail('not exception');
        } catch (BuilderException $e) {
            self::assertEquals('The "apiToken" parameter is required', $e->getMessage());
        }
        try {
            ClientBuilder::create()
                ->setApiUrl(TestConfig::getApiUrl())
                ->setApiToken(TestConfig::getApiToken())
                ->build();
        } catch (BuilderException $e) {
            self::fail($e->getMessage());
        }
        try {
            ClientBuilder::create()
                ->setApiUrl(TestConfig::getApiUrl())
                ->setApiToken(TestConfig::getApiToken())
                ->setCache(new FilesystemAdapter())
                ->setCacheDirPath(TestConfig::getCacheDir())
                ->build();
        } catch (BuilderException $e) {
            self::assertEquals('Specify one "cache" or "cacheDirPath"', $e->getMessage());
        }
    }

    /**
     * @throws BuilderException
     */
    public function testBuild(): void
    {
        $client = ClientBuilder::create()
            ->setApiUrl(TestConfig::getApiUrl())
            ->setApiToken(TestConfig::getApiToken())
            ->build();
        /** @noinspection UnnecessaryAssertionInspection */
        self::assertInstanceOf(Client::class, $client);
    }

    /**
     * @throws BuilderException
     */
    public function testWithLogger(): void
    {
        $logger = new Logger(new NullLogger());
        $client = ClientBuilder::create()
            ->setApiUrl(TestConfig::getApiUrl())
            ->setApiToken(TestConfig::getApiToken())
            ->setLogger($logger)
            ->build();
        self::assertNotEmpty($client);
    }

    /**
     * @throws BuilderException
     */
    public function testWithCache(): void
    {
        $client = ClientBuilder::create()
            ->setApiUrl(TestConfig::getApiUrl())
            ->setApiToken(TestConfig::getApiToken())
            ->setCache(new FilesystemAdapter())
            ->build();
        self::assertNotEmpty($client);
    }

    /**
     * @throws BuilderException
     */
    public function testWithCacheFile(): void
    {
        $client = ClientBuilder::create()
            ->setApiUrl(TestConfig::getApiUrl())
            ->setApiToken(TestConfig::getApiToken())
            ->setCacheDirPath(TestConfig::getCacheDir())
            ->build();
        self::assertNotEmpty($client);
    }
}
