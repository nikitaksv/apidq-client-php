<?php

namespace ApiDQ\Formatter;

use Http\Message\Formatter;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 *
 */
class FullHttpMessageFormatter implements Formatter
{
    /**
     * The maximum length of the body.
     *
     * @var int
     */
    protected int $maxBodyLength;

    /**
     * @param int $maxBodyLength
     */
    public function __construct(int $maxBodyLength = -1)
    {
        $this->maxBodyLength = $maxBodyLength;
    }

    /**
     * {@inheritdoc}
     */
    public function formatRequest(RequestInterface $request): string
    {
        $message = sprintf(
            "%s %s HTTP/%s\n",
            $request->getMethod(),
            $request->getRequestTarget(),
            $request->getProtocolVersion()
        );

        foreach ($request->getHeaders() as $name => $values) {
            $message .= $name . ': ' . implode(', ', $values) . "\n";
        }

        return $this->addBody($request, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function formatResponse(ResponseInterface $response): string
    {
        $message = sprintf(
            "HTTP/%s %s %s\n",
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        );

        foreach ($response->getHeaders() as $name => $values) {
            $message .= $name . ': ' . implode(', ', $values) . "\n";
        }

        return $this->addBody($response, $message);
    }

    /**
     * Add the message body if the stream is seekable.
     *
     * @param MessageInterface $request
     * @param string $message
     *
     * @return string
     */
    private function addBody(MessageInterface $request, string $message): string
    {
        $message .= "\n";
        $stream = $request->getBody();
        if ($this->maxBodyLength === 0 || !$stream->isSeekable()) {
            return $message;
        }

        $data = $stream->__toString();
        $stream->rewind();

        if ($this->maxBodyLength === -1) {
            return $message . $data;
        }

        return $message . mb_substr($data, 0, $this->maxBodyLength);
    }
}
