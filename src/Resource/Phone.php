<?php

namespace ApiDQ\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Phone\CleanRequest;
use ApiDQ\Model\Service\Phone\CleanResponse;
use Psr\Http\Client\ClientExceptionInterface;

class Phone extends AbstractResource
{
    /**
     * @param CleanRequest $cleanRequest
     * @return CleanResponse
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function clean(CleanRequest $cleanRequest): CleanResponse
    {
        return $this->send(
            $this->createRequest(
                'POST',
                $this->uri->withPath('/v1/clean/phone'),
                $cleanRequest,
            ),
            CleanResponse::class
        );
    }
}
