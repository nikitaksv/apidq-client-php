<?php

namespace ApiDQ\Builder;

use ApiDQ\Interfaces\BuilderInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerBuilder implements BuilderInterface
{
    /**
     * @return Serializer
     */
    public function build(): SerializerInterface
    {
        $encoder = [new JsonEncoder()];
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $normalizer = [
            new ArrayDenormalizer(),
            new ObjectNormalizer($classMetadataFactory, $nameConverter, null, $extractor),
        ];

        return new Serializer($normalizer, $encoder);
    }

    /**
     * @return SerializerBuilder
     */
    public static function create(): SerializerBuilder
    {
        return new self();
    }
}
