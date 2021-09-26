<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Детальная информация домой части адреса
 */
class HouseDetails extends BaseModel
{

    protected string $fullName = '';

    protected string $floor = '';

    protected string $house = '';

    protected string $case = '';

    protected string $build = '';

    protected string $liter = '';

    protected string $lend = '';

    protected string $block = '';

    protected string $pav = '';

    protected string $flat = '';

    protected string $office = '';

    protected string $kab = '';

    protected string $abon = '';

    protected string $plot = '';

    protected string $sek = '';

    protected string $entr = '';

    protected string $room = '';

    protected string $hostel = '';

    protected string $munit = '';

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     * @return self
     */
    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFloor(): string
    {
        return $this->floor;
    }

    /**
     * @param string $floor
     * @return self
     */
    public function setFloor(string $floor): self
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @return string
     */
    public function getHouse(): string
    {
        return $this->house;
    }

    /**
     * @param string $house
     * @return self
     */
    public function setHouse(string $house): self
    {
        $this->house = $house;
        return $this;
    }

    /**
     * @return string
     */
    public function getCase(): string
    {
        return $this->case;
    }

    /**
     * @param string $case
     * @return self
     */
    public function setCase(string $case): self
    {
        $this->case = $case;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuild(): string
    {
        return $this->build;
    }

    /**
     * @param string $build
     * @return self
     */
    public function setBuild(string $build): self
    {
        $this->build = $build;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiter(): string
    {
        return $this->liter;
    }

    /**
     * @param string $liter
     * @return self
     */
    public function setLiter(string $liter): self
    {
        $this->liter = $liter;
        return $this;
    }

    /**
     * @return string
     */
    public function getLend(): string
    {
        return $this->lend;
    }

    /**
     * @param string $lend
     * @return self
     */
    public function setLend(string $lend): self
    {
        $this->lend = $lend;
        return $this;
    }

    /**
     * @return string
     */
    public function getBlock(): string
    {
        return $this->block;
    }

    /**
     * @param string $block
     * @return self
     */
    public function setBlock(string $block): self
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return string
     */
    public function getPav(): string
    {
        return $this->pav;
    }

    /**
     * @param string $pav
     * @return self
     */
    public function setPav(string $pav): self
    {
        $this->pav = $pav;
        return $this;
    }

    /**
     * @return string
     */
    public function getFlat(): string
    {
        return $this->flat;
    }

    /**
     * @param string $flat
     * @return self
     */
    public function setFlat(string $flat): self
    {
        $this->flat = $flat;
        return $this;
    }

    /**
     * @return string
     */
    public function getOffice(): string
    {
        return $this->office;
    }

    /**
     * @param string $office
     * @return self
     */
    public function setOffice(string $office): self
    {
        $this->office = $office;
        return $this;
    }

    /**
     * @return string
     */
    public function getKab(): string
    {
        return $this->kab;
    }

    /**
     * @param string $kab
     * @return self
     */
    public function setKab(string $kab): self
    {
        $this->kab = $kab;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbon(): string
    {
        return $this->abon;
    }

    /**
     * @param string $abon
     * @return self
     */
    public function setAbon(string $abon): self
    {
        $this->abon = $abon;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlot(): string
    {
        return $this->plot;
    }

    /**
     * @param string $plot
     * @return self
     */
    public function setPlot(string $plot): self
    {
        $this->plot = $plot;
        return $this;
    }

    /**
     * @return string
     */
    public function getSek(): string
    {
        return $this->sek;
    }

    /**
     * @param string $sek
     * @return self
     */
    public function setSek(string $sek): self
    {
        $this->sek = $sek;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntr(): string
    {
        return $this->entr;
    }

    /**
     * @param string $entr
     * @return self
     */
    public function setEntr(string $entr): self
    {
        $this->entr = $entr;
        return $this;
    }

    /**
     * @return string
     */
    public function getRoom(): string
    {
        return $this->room;
    }

    /**
     * @param string $room
     * @return self
     */
    public function setRoom(string $room): self
    {
        $this->room = $room;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostel(): string
    {
        return $this->hostel;
    }

    /**
     * @param string $hostel
     * @return self
     */
    public function setHostel(string $hostel): self
    {
        $this->hostel = $hostel;
        return $this;
    }

    /**
     * @return string
     */
    public function getMunit(): string
    {
        return $this->munit;
    }

    /**
     * @param string $munit
     * @return self
     */
    public function setMunit(string $munit): self
    {
        $this->munit = $munit;
        return $this;
    }
}
