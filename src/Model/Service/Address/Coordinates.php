<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Объект, представляющий пару широта/долгота
 */
class Coordinates extends BaseModel
{
    /**
     * Широта в градусах. Значение должно быть в диапазоне [-90.0, +90.0].
     */
    protected float $latitude = 0.0;
    /**
     * Долгота в градусах. Значение должно быть в диапазоне[-180.0, +180.0].
     */
    protected float $longitude = 0.0;

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return self
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return self
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }
}
