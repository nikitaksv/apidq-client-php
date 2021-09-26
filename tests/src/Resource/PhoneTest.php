<?php

namespace ApiDQ\Tests\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Phone\CleanRequest;
use ApiDQ\TestUtils\Factory\TestClientFactory;
use ApiDQ\TestUtils\TestCase\AbstractResourceTestCase;
use Pock\Enum\RequestMethod;
use Psr\Http\Client\ClientExceptionInterface;

class PhoneTest extends AbstractResourceTestCase
{

    /**
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function testClean(): void
    {
        $json = <<<'EOF'
{
  "original": "89615255099",
  "international": "+7 961 525-50-99",
  "national": "8 (961) 525-50-99",
  "E164": "+79615255099",
  "RFC3966": "tel:+7-961-525-50-99",
  "carrier": "Beeline",
  "countryCode": 7,
  "country": "RU",
  "areaCode": "",
  "timezones": [
    "Europe/Moscow"
  ],
  "geocoding": "",
  "subscriberNumber": "9615255099",
  "type": "MOBILE",
  "possible": true,
  "valid": true
}
EOF;
        $request = (new CleanRequest())
            ->setQuery('89615255099')
            ->setCountryCode('RU');

        $mock = static::createApiMockBuilder('/v1/clean/phone');
        $mock->matchMethod(RequestMethod::POST)->reply()->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        $response = $client->phone->clean($request);
        self::assertEquals($request->getQuery(), $response->getOriginal());
        $rspJson = static::$serializer->serialize($response, 'json');
        self::assertJsonStringEqualsJsonString($json, $rspJson);
    }
}
