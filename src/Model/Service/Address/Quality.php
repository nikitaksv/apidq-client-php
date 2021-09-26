<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Код качества
 */
class Quality extends BaseModel
{
    /**
     * Уровень уникальности найденного адреса
     */
    protected int $unique = 0;
    /**
     * Статус актальности
     */
    protected int $actuality = 0;
    /**
     * Уровень значимости неразобранной части адреса
     */
    protected int $undefined = 0;
    /**
     * Уровень, до которого адрес разобран
     */
    protected int $level = 0;
    /**
     * Статус дома
     */
    protected int $house = 0;
    /**
     * Статус координат
     */
    protected int $geo = 0;

    /**
     * @return int
     */
    public function getUnique(): int
    {
        return $this->unique;
    }

    /**
     * @param int $unique
     * @return self
     */
    public function setUnique(int $unique): self
    {
        $this->unique = $unique;
        return $this;
    }

    /**
     * @return int
     */
    public function getActuality(): int
    {
        return $this->actuality;
    }

    /**
     * @param int $actuality
     * @return self
     */
    public function setActuality(int $actuality): self
    {
        $this->actuality = $actuality;
        return $this;
    }

    /**
     * @return int
     */
    public function getUndefined(): int
    {
        return $this->undefined;
    }

    /**
     * @param int $undefined
     * @return self
     */
    public function setUndefined(int $undefined): self
    {
        $this->undefined = $undefined;
        return $this;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return self
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;
        return $this;
    }

    /**
     * @return int
     */
    public function getHouse(): int
    {
        return $this->house;
    }

    /**
     * @param int $house
     * @return self
     */
    public function setHouse(int $house): self
    {
        $this->house = $house;
        return $this;
    }

    /**
     * @return int
     */
    public function getGeo(): int
    {
        return $this->geo;
    }

    /**
     * @param int $geo
     * @return self
     */
    public function setGeo(int $geo): self
    {
        $this->geo = $geo;
        return $this;
    }
}
