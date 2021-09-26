<?php

namespace ApiDQ\Builder;

use ApiDQ\Client;
use ApiDQ\Exception\Client\BuilderException;
use ApiDQ\Factory\SerializerFactory;
use ApiDQ\Interfaces\BuilderInterface;
use ApiDQ\Model\Logger;
use ApiDQ\TestUtils\TestConfig;
use Http\Client\Common\Plugin;
use Http\Client\Common\Plugin\AuthenticationPlugin;
use Http\Client\Common\Plugin\CachePlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Authentication\Header;
use Http\Message\Formatter;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Serializer\SerializerInterface;

/**
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ClientBuilder implements BuilderInterface
{
    /**
     * @var array<Plugin>
     */
    protected array $plugins = [];
    protected string $apiUrl = '';
    protected string $apiToken = '';
    protected string $cacheDirPath = '';
    protected ?RequestFactoryInterface $requestFactory = null;
    protected ?StreamFactoryInterface $streamFactory = null;
    protected ?SerializerInterface $serializer = null;
    protected ?ClientInterface $client = null;
    protected ?CacheItemPoolInterface $cache = null;
    protected ?Logger $logger = null;

    /**
     * @param ClientInterface $client
     * @return self
     */
    public function setClient(ClientInterface $client): self
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @param string $apiUrl
     * @return self
     */
    public function setApiUrl(string $apiUrl): self
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }

    /**
     * @param RequestFactoryInterface $requestFactory
     * @return self
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory): self
    {
        $this->requestFactory = $requestFactory;
        return $this;
    }

    /**
     * @param StreamFactoryInterface $streamFactory
     * @return self
     */
    public function setStreamFactory(StreamFactoryInterface $streamFactory): self
    {
        $this->streamFactory = $streamFactory;
        return $this;
    }

    /**
     * @param string $apiToken
     * @return self
     */
    public function setApiToken(string $apiToken): self
    {
        $this->apiToken = $apiToken;
        return $this;
    }

    /**
     * @param CacheItemPoolInterface|null $cache
     * @return self
     */
    public function setCache(?CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @param string $cacheDirPath
     * @return self
     */
    public function setCacheDirPath(string $cacheDirPath): self
    {
        $this->cacheDirPath = $cacheDirPath;
        return $this;
    }

    /**
     * @param Logger $logger
     * @return self
     */
    public function setLogger(Logger $logger): self
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param SerializerInterface|null $serializer
     * @return self
     */
    public function setSerializer(?SerializerInterface $serializer): self
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * @return Client
     * @throws BuilderException
     */
    public function build(): Client
    {
        $this->validate();

        $requestFactory = $this->requestFactory ?: Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = $this->streamFactory ?: Psr17FactoryDiscovery::findStreamFactory();
        $serializer = $this->serializer ?: SerializerFactory::createSerializer();

        $this->buildAuthPlugin($this->apiToken);
        $this->buildCachePlugin($streamFactory);
        $this->buildLoggerPlugin();

        return new Client(
            $this->apiUrl,
            $this->buildClient(),
            $requestFactory,
            $streamFactory,
            $serializer
        );
    }

    protected function buildClient(): ClientInterface
    {
        $client = $this->client ?: Psr18ClientDiscovery::find();
        if (count($this->plugins) > 0) {
            $client = new PluginClient($client, $this->plugins);
        }

        return $client;
    }

    protected function buildAuthPlugin(string $apiToken): void
    {
        if (!empty($apiToken)) {
            $this->plugins[] = new AuthenticationPlugin(
                new Header('Authorization', TestConfig::getApiToken())
            );
        }
    }

    protected function buildCachePlugin(StreamFactoryInterface $streamFactory): void
    {
        if ($this->cache !== null) {
            $this->plugins[] = CachePlugin::clientCache($this->cache, $streamFactory);
        }

        if ($this->cacheDirPath !== '') {
            $logger = null;
            $namespace = '';
            if ($this->logger !== null && $this->logger->getOptions()[Logger::LOGGER_SCOPE_FILE_CACHE]['enabled']) {
                $logger = $this->logger->getPsrLogger();
                $namespace = $this->logger->getOptions()[Logger::LOGGER_SCOPE_FILE_CACHE]['namespace'];
            }
            $cache = new FilesystemAdapter($namespace, 0, $this->cacheDirPath);
            if ($logger !== null) {
                $cache->setLogger($logger);
            }
            $this->plugins[] = CachePlugin::clientCache($cache, $streamFactory);
        }
    }

    protected function buildLoggerPlugin(): void
    {
        if ($this->logger !== null && $this->logger->getOptions()[Logger::LOGGER_SCOPE_TRANSPORT]['enabled']) {
            /** @var Formatter $formatter */
            $formatter = $this->logger->getOptions()[Logger::LOGGER_SCOPE_TRANSPORT]['formatter'];
            $this->plugins[] = new LoggerPlugin($this->logger->getPsrLogger(), $formatter);
        }
    }

    /**
     * @throws BuilderException
     */
    protected function validate(): void
    {
        if ($this->apiUrl === '') {
            throw new BuilderException('The "apiUrl" parameter is required');
        }
        if ($this->apiToken === '') {
            throw new BuilderException('The "apiToken" parameter is required');
        }
        if ($this->cache !== null && $this->cacheDirPath !== '') {
            throw new BuilderException('Specify one "cache" or "cacheDirPath"');
        }
    }

    public static function create(): self
    {
        return new self();
    }
}
