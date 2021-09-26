<?php

namespace ApiDQ\Model\Service\Phone;

use ApiDQ\Model\BaseModel;

/**
 * Стандартизация номера телефона
 */
class CleanRequest extends BaseModel
{
    /**
     * Phone number
     */
    protected string $query = '';
    /**
     * Phone region code. Used ISO 3166 (see. https://www.iso.org/iso-3166-country-codes.html)
     */
    protected string $countryCode = '';

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
}
