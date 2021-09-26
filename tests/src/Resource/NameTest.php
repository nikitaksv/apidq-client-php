<?php

namespace ApiDQ\Tests\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Name\CleanRequest;
use ApiDQ\Model\Service\Name\SuggestRequest;
use ApiDQ\TestUtils\Factory\TestClientFactory;
use ApiDQ\TestUtils\TestCase\AbstractResourceTestCase;
use Pock\Enum\RequestMethod;
use Psr\Http\Client\ClientExceptionInterface;

class NameTest extends AbstractResourceTestCase
{

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testClean(): void
    {
        $json = <<<'EOF'
{
  "original": "Никит Владмировч Красникв",
  "result": "Никита Владимирович Красников",
  "lastName": "Красников",
  "firstName": "Никита",
  "middleName": "Владимирович",
  "gender": "MALE",
  "unparsedParts": [],
  "possible": true,
  "valid": true
}
EOF;
        $request = (new CleanRequest())
            ->setQuery('Никит Владмировч Красникв');

        $mock = static::createApiMockBuilder('/v1/clean/name');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->name->clean($request);
        self::assertEquals($request->getQuery(), $response->getOriginal());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testSuggest(): void
    {
        $json = <<<'EOF'
{
  "suggestions": [
    {
      "result": "Никита",
      "lang": "rus",
      "gender": "MALE"
    }
  ]
}
EOF;

        $request = (new SuggestRequest())
            ->setQuery('Никит')
            ->setType('NAME')
            ->setCount(1);

        $mock = static::createApiMockBuilder('/v1/suggest/name');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->name->suggest($request);
        self::assertCount($request->getCount(), $response->getSuggestions());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }
}
