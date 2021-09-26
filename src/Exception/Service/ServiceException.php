<?php

namespace ApiDQ\Exception\Service;

use ApiDQ\Model\ErrorResponse;
use Exception;
use Throwable;

/**
 * Ошибка сервиса
 */
class ServiceException extends Exception
{

    protected ErrorResponse $errorResponse;

    /**
     * @param ErrorResponse $errorResponse
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        ErrorResponse $errorResponse,
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->errorResponse = $errorResponse;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ErrorResponse
     */
    public function getErrorResponse(): ErrorResponse
    {
        return $this->errorResponse;
    }

    /**
     * @param ErrorResponse $errorResponse
     * @return self
     */
    public function setErrorResponse(ErrorResponse $errorResponse): self
    {
        $this->errorResponse = $errorResponse;
        return $this;
    }
}
