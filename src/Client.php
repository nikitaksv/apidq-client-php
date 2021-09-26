<?php

namespace ApiDQ;

use ApiDQ\Resource\Address;
use ApiDQ\Resource\Name;
use ApiDQ\Resource\Phone;
use League\Uri\Uri;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\Serializer\SerializerInterface;

class Client
{
    public const BASE_URL = 'https://api.apidq.io/';

    public Address $address;
    public Name $name;
    public Phone $phone;

    public function __construct(
        string $apiUrl,
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactory,
        StreamFactoryInterface $streamFactory,
        SerializerInterface $serializer
    ) {
        $uri = Uri::createFromString($apiUrl);
        $this->address = new Address($uri, $httpClient, $requestFactory, $streamFactory, $serializer);
        $this->name = new Name($uri, $httpClient, $requestFactory, $streamFactory, $serializer);
        $this->phone = new Phone($uri, $httpClient, $requestFactory, $streamFactory, $serializer);
    }
}
