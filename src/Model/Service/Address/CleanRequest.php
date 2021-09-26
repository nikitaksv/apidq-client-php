<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

class CleanRequest extends BaseModel
{
    /**
     * Адресный запрос
     */
    protected string $query = '';
    /**
     * Код страны, используется стандарт ISO 3166-1 alpha-2
     */
    protected string $countryCode = '';

    /**
     * @return string Адресный запрос
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query Адресный запрос
     * @return self
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Код страны, используется стандарт ISO 3166-1 alpha-2
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode Код страны, используется стандарт ISO 3166-1 alpha-2
     * @return self
     */
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }
}
