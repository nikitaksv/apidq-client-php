<?php

namespace ApiDQ\Model;

class ErrorResponse extends BaseModel
{
    /**
     * @var int GRPC Status Code
     * @see https://grpc.github.io/grpc/core/md_doc_statuscodes.html
     */
    protected int $code = 0;
    /**
     * @var string Сообщение об ошибке
     */
    protected string $message = '';

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     * @return self
     */
    public function setCode(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return self
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
