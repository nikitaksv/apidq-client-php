<?php

namespace ApiDQ\Resource;

use ApiDQ\Exception\Service\ServiceException;
use ApiDQ\Model\Service\Name\CleanRequest;
use ApiDQ\Model\Service\Name\CleanResponse;
use ApiDQ\Model\Service\Name\SuggestRequest;
use ApiDQ\Model\Service\Name\SuggestResponse;
use Psr\Http\Client\ClientExceptionInterface;

class Name extends AbstractResource
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
                $this->uri->withPath('/v1/clean/name'),
                $cleanRequest,
            ),
            CleanResponse::class
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
                $this->uri->withPath('/v1/suggest/name'),
                $suggestRequest,
            ),
            SuggestResponse::class
        );
    }
}
