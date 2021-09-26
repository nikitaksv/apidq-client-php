<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

class CleanResponse extends BaseModel
{
    /**
     * Оригинальный адрес
     */
    protected string $original = '';
    /**
     * Полный адрес строкой
     */
    protected string $address = '';
    /**
     * Оригинальный почтовый индекс
     */
    protected string $postcodeIn = '';
    /**
     * Почтовый индекс
     */
    protected string $postcode = '';
    /**
     * Информация о регионе
     */
    protected ?Part $region = null;
    /**
     * Информация о районе региона
     */
    protected ?Part $area = null;
    /**
     * Информация о городе
     */
    protected ?Part $city = null;
    /**
     * Информация о районе города
     */
    protected ?Part $cityArea = null;
    /**
     * Информация о населенном пукте (деревня, поселок, станица, снт и т.д.)
     */
    protected ?Part $settlement = null;
    /**
     * Информация о планировочной структуре
     */
    protected ?Part $planStructure = null;
    /**
     * Информация об улице
     */
    protected ?Part $street = null;
    /**
     * Детальная информация домовой части
     */
    protected ?HouseDetails $houseDetails = null;
    /**
     * Координаты адреса
     */
    protected ?Coordinates $coordinates = null;
    /**
     * Информация о стране
     */
    protected ?Country $country = null;
    /**
     * Качество: действительный
     */
    protected bool $valid = false;
    /**
     * Код качества
     */
    protected ?Quality $quality = null;

    /**
     * @return string
     */
    public function getOriginal(): string
    {
        return $this->original;
    }

    /**
     * @param string $original
     * @return self
     */
    public function setOriginal(string $original): self
    {
        $this->original = $original;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcodeIn(): string
    {
        return $this->postcodeIn;
    }

    /**
     * @param string $postcodeIn
     * @return self
     */
    public function setPostcodeIn(string $postcodeIn): self
    {
        $this->postcodeIn = $postcodeIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @param string $postcode
     * @return self
     */
    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getRegion(): ?Part
    {
        return $this->region;
    }

    /**
     * @param Part|null $region
     * @return self
     */
    public function setRegion(?Part $region): self
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getArea(): ?Part
    {
        return $this->area;
    }

    /**
     * @param Part|null $area
     * @return self
     */
    public function setArea(?Part $area): self
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getCity(): ?Part
    {
        return $this->city;
    }

    /**
     * @param Part|null $city
     * @return self
     */
    public function setCity(?Part $city): self
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getCityArea(): ?Part
    {
        return $this->cityArea;
    }

    /**
     * @param Part|null $cityArea
     * @return self
     */
    public function setCityArea(?Part $cityArea): self
    {
        $this->cityArea = $cityArea;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getSettlement(): ?Part
    {
        return $this->settlement;
    }

    /**
     * @param Part|null $settlement
     * @return self
     */
    public function setSettlement(?Part $settlement): self
    {
        $this->settlement = $settlement;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getPlanStructure(): ?Part
    {
        return $this->planStructure;
    }

    /**
     * @param Part|null $planStructure
     * @return self
     */
    public function setPlanStructure(?Part $planStructure): self
    {
        $this->planStructure = $planStructure;
        return $this;
    }

    /**
     * @return Part|null
     */
    public function getStreet(): ?Part
    {
        return $this->street;
    }

    /**
     * @param Part|null $street
     * @return self
     */
    public function setStreet(?Part $street): self
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return HouseDetails|null
     */
    public function getHouseDetails(): ?HouseDetails
    {
        return $this->houseDetails;
    }

    /**
     * @param HouseDetails|null $houseDetails
     * @return self
     */
    public function setHouseDetails(?HouseDetails $houseDetails): self
    {
        $this->houseDetails = $houseDetails;
        return $this;
    }

    /**
     * @return Coordinates|null
     */
    public function getCoordinates(): ?Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param Coordinates|null $coordinates
     * @return self
     */
    public function setCoordinates(?Coordinates $coordinates): self
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @param Country|null $country
     * @return self
     */
    public function setCountry(?Country $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     * @return self
     */
    public function setValid(bool $valid): self
    {
        $this->valid = $valid;
        return $this;
    }

    /**
     * @return Quality|null
     */
    public function getQuality(): ?Quality
    {
        return $this->quality;
    }

    /**
     * @param Quality|null $quality
     * @return self
     */
    public function setQuality(?Quality $quality): self
    {
        $this->quality = $quality;
        return $this;
    }
}
