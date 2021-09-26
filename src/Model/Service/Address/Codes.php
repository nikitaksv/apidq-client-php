<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Коды из различных систем
 *
 *
 */
class Codes extends BaseModel
{
    /**
     * ФИАС-код - код из справочника налоговой РФ
     */
    protected string $fias = '';
    /**
     * GaCode - глобальный код ApiDQ
     */
    protected string $ga = '';
    /**
     * OSM-код - код из OpenStreetMap
     */
    protected string $osm = '';

    /**
     * @return string
     */
    public function getFias(): string
    {
        return $this->fias;
    }

    /**
     * @param string $fias
     * @return self
     */
    public function setFias(string $fias): self
    {
        $this->fias = $fias;
        return $this;
    }

    /**
     * @return string
     */
    public function getGa(): string
    {
        return $this->ga;
    }

    /**
     * @param string $ga
     * @return self
     */
    public function setGa(string $ga): self
    {
        $this->ga = $ga;
        return $this;
    }

    /**
     * @return string
     */
    public function getOsm(): string
    {
        return $this->osm;
    }

    /**
     * @param string $osm
     * @return self
     */
    public function setOsm(string $osm): self
    {
        $this->osm = $osm;
        return $this;
    }
}
