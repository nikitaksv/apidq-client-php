<?php

namespace ApiDQ\Model;

/**
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class BaseModel
{
    /**
     * @param array<string,mixed> $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $property => $value) {
            $this->$property = $value;
        }
    }
}
