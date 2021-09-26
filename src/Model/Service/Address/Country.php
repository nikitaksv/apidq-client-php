<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Информация о стране
 */
class Country extends BaseModel
{
    /**
     * Название страны текстом
     */
    protected string $name = '';
    /**
     * Код страны, используется стандарт ISO 3166-1 alpha-2
     */
    protected string $alpha2 = '';
    /**
     * Код страны, используется стандарт ISO 3166-1 alpha-3
     */
    protected string $alpha3 = '';
    /**
     * Номер страны, используется стандарт ISO 3166-1 numeric
     */
    protected int $numeric = 0;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlpha2(): string
    {
        return $this->alpha2;
    }

    /**
     * @param string $alpha2
     * @return self
     */
    public function setAlpha2(string $alpha2): self
    {
        $this->alpha2 = $alpha2;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlpha3(): string
    {
        return $this->alpha3;
    }

    /**
     * @param string $alpha3
     * @return self
     */
    public function setAlpha3(string $alpha3): self
    {
        $this->alpha3 = $alpha3;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumeric(): int
    {
        return $this->numeric;
    }

    /**
     * @param int $numeric
     * @return self
     */
    public function setNumeric(int $numeric): self
    {
        $this->numeric = $numeric;
        return $this;
    }
}
