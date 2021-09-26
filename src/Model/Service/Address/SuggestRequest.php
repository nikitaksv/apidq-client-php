<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class SuggestRequest extends BaseModel
{
    /**
     * Поисковой запрос
     */
    protected string $query = '';
    /**
     * Код страны, используется стандарт ISO 3166-1 alpha-2
     */
    protected string $countryCode = '';
    /**
     * Максимальное количество подсказок
     */
    protected int $count = 0;

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

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     * @return self
     */
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return self
     */
    public function setCount(int $count): self
    {
        $this->count = $count;
        return $this;
    }
}
