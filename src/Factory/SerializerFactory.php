<?php

namespace ApiDQ\Factory;

use ApiDQ\Builder\SerializerBuilder;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerFactory
{
    /**
     * @return SerializerInterface
     */
    public static function createSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->build();
    }
}
