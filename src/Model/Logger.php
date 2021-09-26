<?php

namespace ApiDQ\Model;

use ApiDQ\Formatter\FullHttpMessageFormatter;
use Http\Message\Formatter;
use Psr\Log\LoggerInterface;

class Logger
{

    public const LOGGER_SCOPE_TRANSPORT = 'transport';
    public const LOGGER_SCOPE_FILE_CACHE = 'fileCache';

    protected LoggerInterface $logger;
    /**
     * @var array<string,array>
     */
    protected array $options = [
        self::LOGGER_SCOPE_TRANSPORT  => [
            'enabled'   => true,
            'formatter' => null,
        ],
        self::LOGGER_SCOPE_FILE_CACHE => [
            'enabled'   => true,
            'namespace' => 'apidq'
        ],
    ];

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->options[self::LOGGER_SCOPE_TRANSPORT]['formatter'] = new FullHttpMessageFormatter();
    }

    /**
     * @return self
     */
    public function withoutTransportLogging(): self
    {
        $this->options[self::LOGGER_SCOPE_TRANSPORT]['enabled'] = false;
        return $this;
    }

    /**
     * @param Formatter $formatter
     * @return self
     */
    public function replaceTransportFormatter(Formatter $formatter): self
    {
        $this->options[self::LOGGER_SCOPE_TRANSPORT]['formatter'] = $formatter;
        return $this;
    }

    /**
     * @return self
     */
    public function withoutFileCacheLogging(): self
    {
        $this->options[self::LOGGER_SCOPE_FILE_CACHE]['enabled'] = false;
        return $this;
    }

    /**
     * @return array<string,array<string,string>>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return LoggerInterface
     */
    public function getPsrLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string $namespace
     * @return self
     */
    public function replaceFileCacheNamespace(string $namespace): self
    {
        $this->options[self::LOGGER_SCOPE_TRANSPORT]['namespace'] = $namespace;
        return $this;
    }
}
