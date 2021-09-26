<?php

namespace ApiDQ\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Address\CleanIqdqResponse;
use ApiDQ\Model\Service\Address\CleanRequest;
use ApiDQ\Model\Service\Address\CleanResponse;
use ApiDQ\Model\Service\Address\SuggestRequest;
use ApiDQ\Model\Service\Address\SuggestResponse;
use Psr\Http\Client\ClientExceptionInterface;

class Address extends AbstractResource
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
                $this->uri->withPath('/v1/clean/address'),
                $cleanRequest,
            ),
            CleanResponse::class
        );
    }

    /**
     * @param CleanRequest $cleanRequest
     * @return CleanIqdqResponse
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function cleanIqdq(CleanRequest $cleanRequest): CleanIqdqResponse
    {
        return $this->send(
            $this->createRequest(
                'POST',
                $this->uri->withPath('/v1/clean/address/iqdq'),
                $cleanRequest,
            ),
            CleanIqdqResponse::class
        );
    }

    /**
     * @param SuggestRequest $suggestRequest
     * @return SuggestResponse
     * @throws ClientExceptionInterface
     * @throws ServiceException
     */
    public function suggest(SuggestRequest $suggestRequest): SuggestResponse
    {
        return $this->send(
            $this->createRequest(
                'POST',
                $this->uri->withPath('/v1/suggest/address'),
                $suggestRequest,
            ),
            SuggestResponse::class
        );
    }
}
