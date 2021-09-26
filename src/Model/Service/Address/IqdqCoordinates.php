<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Объект, представляющий пару широта/долгота
 */
class IqdqCoordinates extends BaseModel
{
    /**
     * Широта в градусах. Значение должно быть в диапазоне [-90.0, +90.0].
     * @SerializedName("c_lon")
     */
    protected float $cLon = 0.0;
    /**
     * Долгота в градусах. Значение должно быть в диапазоне[-180.0, +180.0].
     * @SerializedName("c_lat")
     */
    protected float $cLat = 0.0;
    /**
     * Уровень, до которого разобраны координате
     * @SerializedName("c_level")
     */
    protected float $cLevel = 0;

    /**
     * @return float
     */
    public function getCLon(): float
    {
        return $this->cLon;
    }

    /**
     * @param float $cLon
     * @return self
     */
    public function setCLon(float $cLon): self
    {
        $this->cLon = $cLon;
        return $this;
    }

    /**
     * @return float
     */
    public function getCLat(): float
    {
        return $this->cLat;
    }

    /**
     * @param float $cLat
     * @return self
     */
    public function setCLat(float $cLat): self
    {
        $this->cLat = $cLat;
        return $this;
    }

    /**
     * @return float|int
     */
    public function getCLevel()
    {
        return $this->cLevel;
    }

    /**
     * @param float|int $cLevel
     * @return self
     */
    public function setCLevel($cLevel): self
    {
        $this->cLevel = $cLevel;
        return $this;
    }
}
