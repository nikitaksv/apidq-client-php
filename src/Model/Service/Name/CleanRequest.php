<?php

namespace ApiDQ\Model\Service\Name;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class CleanRequest extends BaseModel
{
    /**
     * Строка поиска
     */
    protected string $query = '';

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return self
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;
        return $this;
    }
}
