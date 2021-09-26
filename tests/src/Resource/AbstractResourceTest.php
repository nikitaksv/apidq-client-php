<?php

namespace ApiDQ\Tests\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Address\CleanRequest;
use ApiDQ\TestUtils\Factory\TestClientFactory;
use ApiDQ\TestUtils\TestCase\AbstractResourceTestCase;
use Pock\Enum\RequestMethod;
use Psr\Http\Client\ClientExceptionInterface;

class AbstractResourceTest extends AbstractResourceTestCase
{

    /**
     * @throws ClientExceptionInterface
     */
    public function testServiceException(): void
    {
        $json = <<<'EOF'
{
  "code": 3,
  "message": "query: значение не может быть пустым.",
  "details": []
}
EOF;

        $request = (new CleanRequest())
            ->setCountryCode('RU');

        $mock = static::createApiMockBuilder('/v1/clean/address');
        $mock->matchMethod(RequestMethod::POST)->reply(400)->withBody($json);

        $client = TestClientFactory::createClient($mock->getClient());
        try {
            $client->address->clean($request);
            self::fail('response returned, but need exception ServiceException');
        } catch (ServiceException $e) {
            self::assertEquals(3, $e->getErrorResponse()->getCode());
            self::assertEquals('query: значение не может быть пустым.', $e->getErrorResponse()->getMessage());
        }
    }
}
