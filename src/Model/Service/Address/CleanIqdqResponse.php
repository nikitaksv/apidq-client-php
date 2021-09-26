<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class CleanIqdqResponse extends BaseModel
{
    /**
     * Статус проверки
     * @SerializedName("c_ischeck")
     */
    protected string $cIscheck = '';
    /**
     * Индекс во входящей строке
     * @SerializedName("c_index_in")
     */
    protected string $cIndexIn = '';
    /**
     * Индекс найденный
     * @SerializedName("c_zipcode")
     */
    protected string $cZipcode = '';
    /**
     * Полученный на вход адрес
     * @SerializedName("c_address_original")
     */
    protected string $cAddressOriginal = '';
    /**
     * Найденный адрес (до улицы)
     * @SerializedName("c_address_full")
     */
    protected string $cAddressFull = '';
    /**
     * Код КЛАДР найденный
     * @SerializedName("c_kladr")
     */
    protected string $cKladr = '';
    /**
     * Глобальный адресный код
     * @SerializedName("c_gaCode")
     */
    protected string $cGaCode = '';
    /**
     * Название страны текстом
     * @SerializedName("c_country")
     */
    protected string $cCountry = '';
    /**
     *  Код страны, используется стандарт ISO 3166-1 alpha-2
     * @SerializedName("c_country_iso_code")
     */
    protected string $cCountryIsoCode = '';
    /**
     * Наименование региона
     * @SerializedName("c_region_name")
     */
    protected string $cRegionName = '';
    /**
     * Сокращенное название аббревиатуры региона
     * @SerializedName("c_region_abbr")
     */
    protected string $cRegionAbbr = '';
    /**
     * ФИАС региона
     * @SerializedName("c_region_fias")
     */
    protected string $cRegionFias = '';
    /**
     * Наименование района
     * @SerializedName("c_district_name")
     */
    protected string $cDistrictName = '';
    /**
     * Сокращенное название аббревиатуры района
     * @SerializedName("c_district_abbr")
     */
    protected string $cDistrictAbbr = '';
    /**
     * ФИАС района
     * @SerializedName("c_district_fias")
     */
    protected string $cDistrictFias = '';
    /**
     * Наименование города
     * @SerializedName("c_city_name")
     */
    protected string $cCityName = '';
    /**
     * Сокращенное название аббревиатуры города
     * @SerializedName("c_city_abbr")
     */
    protected string $cCityAbbr = '';
    /**
     * ФИАС города
     * @SerializedName("c_city_fias")
     */
    protected string $cCityFias = '';
    /**
     * Наименование населенного пункта
     * @SerializedName("c_community_name")
     */
    protected string $cCommunityName = '';
    /**
     * Сокращенное название аббревиатуры населенного пункта
     * @SerializedName("c_community_abbr")
     */
    protected string $cCommunityAbbr = '';
    /**
     * ФИАС населенного пункта
     * @SerializedName("c_community_fias")
     */
    protected string $cCommunityFias = '';
    /**
     * Наименование улицы
     * @SerializedName("c_street_name")
     */
    protected string $cStreetName = '';
    /**
     * Сокращенное название аббревиатуры улицы
     * @SerializedName("c_street_abbr")
     */
    protected string $cStreetAbbr = '';
    /**
     * ФИАС улицы
     * @SerializedName("c_street_fias")
     */
    protected string $cStreetFias = '';
    /**
     * Номер дома
     * @SerializedName("c_house_str")
     */
    protected string $cHouseStr = '';
    /**
     * Неразобранная часть входящей строки
     * @SerializedName("c_addr_lost")
     */
    protected string $cAddrLost = '';
    /**
     * Код качества
     * @SerializedName("c_status_error")
     */
    protected string $cStatusError = '';
    /**
     * Статус разбора дома (код)
     * @SerializedName("c_house_error")
     */
    protected string $cHouseError = '';
    /**
     * Статус разбора дома (описание)
     * @SerializedName("c_house_error_desc")
     */
    protected string $cHouseErrorDesc = '';
    /**
     * 19-значный КЛАДР
     * @SerializedName("c_kladr19")
     */
    protected string $cKladr19 = '';
    /**
     * Код ИФНС
     * @SerializedName("c_gninmb")
     */
    protected string $cGninmb = '';
    /**
     * Код ОКАТО
     * @SerializedName("c_okato")
     */
    protected string $cOkato = '';
    /**
     * Код ОКТМО
     * @SerializedName("c_oktmo")
     */
    protected string $cOktmo = '';
    /**
     * Код ФИАС до улицы
     * @SerializedName("c_aoguid")
     */
    protected string $cAoguid = '';
    /**
     * Уровень по ФИАС
     * @SerializedName("c_aolevel")
     */
    protected string $cAolevel = '';
    /**
     * Идентификатор дома
     * @SerializedName("c_houseguid")
     */
    protected string $cHouseguid = '';
    /**
     * Часовой пояс
     * @SerializedName("c_timezone")
     */
    protected string $cTimezone = '';
    /**
     * Координаты адреса
     * @SerializedName("c_coordinate")
     */
    protected ?IqdqCoordinates $cCoordinate;
    /**
     * Домовая часть
     * @SerializedName("c_json_kvant")
     * @var HouseDetails|null
     */
    protected ?HouseDetails $cJsonKvant;

    /**
     * @return string
     */
    public function getCIscheck(): string
    {
        return $this->cIscheck;
    }

    /**
     * @param string $cIscheck
     * @return self
     */
    public function setCIscheck(string $cIscheck): self
    {
        $this->cIscheck = $cIscheck;
        return $this;
    }

    /**
     * @return string
     */
    public function getCIndexIn(): string
    {
        return $this->cIndexIn;
    }

    /**
     * @param string $cIndexIn
     * @return self
     */
    public function setCIndexIn(string $cIndexIn): self
    {
        $this->cIndexIn = $cIndexIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getCZipcode(): string
    {
        return $this->cZipcode;
    }

    /**
     * @param string $cZipcode
     * @return self
     */
    public function setCZipcode(string $cZipcode): self
    {
        $this->cZipcode = $cZipcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCAddressOriginal(): string
    {
        return $this->cAddressOriginal;
    }

    /**
     * @param string $cAddressOriginal
     * @return self
     */
    public function setCAddressOriginal(string $cAddressOriginal): self
    {
        $this->cAddressOriginal = $cAddressOriginal;
        return $this;
    }

    /**
     * @return string
     */
    public function getCAddressFull(): string
    {
        return $this->cAddressFull;
    }

    /**
     * @param string $cAddressFull
     * @return self
     */
    public function setCAddressFull(string $cAddressFull): self
    {
        $this->cAddressFull = $cAddressFull;
        return $this;
    }

    /**
     * @return string
     */
    public function getCKladr(): string
    {
        return $this->cKladr;
    }

    /**
     * @param string $cKladr
     * @return self
     */
    public function setCKladr(string $cKladr): self
    {
        $this->cKladr = $cKladr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCGaCode(): string
    {
        return $this->cGaCode;
    }

    /**
     * @param string $cGaCode
     * @return self
     */
    public function setCGaCode(string $cGaCode): self
    {
        $this->cGaCode = $cGaCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCountry(): string
    {
        return $this->cCountry;
    }

    /**
     * @param string $cCountry
     * @return self
     */
    public function setCCountry(string $cCountry): self
    {
        $this->cCountry = $cCountry;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCountryIsoCode(): string
    {
        return $this->cCountryIsoCode;
    }

    /**
     * @param string $cCountryIsoCode
     * @return self
     */
    public function setCCountryIsoCode(string $cCountryIsoCode): self
    {
        $this->cCountryIsoCode = $cCountryIsoCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCRegionName(): string
    {
        return $this->cRegionName;
    }

    /**
     * @param string $cRegionName
     * @return self
     */
    public function setCRegionName(string $cRegionName): self
    {
        $this->cRegionName = $cRegionName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCRegionAbbr(): string
    {
        return $this->cRegionAbbr;
    }

    /**
     * @param string $cRegionAbbr
     * @return self
     */
    public function setCRegionAbbr(string $cRegionAbbr): self
    {
        $this->cRegionAbbr = $cRegionAbbr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCRegionFias(): string
    {
        return $this->cRegionFias;
    }

    /**
     * @param string $cRegionFias
     * @return self
     */
    public function setCRegionFias(string $cRegionFias): self
    {
        $this->cRegionFias = $cRegionFias;
        return $this;
    }

    /**
     * @return string
     */
    public function getCDistrictName(): string
    {
        return $this->cDistrictName;
    }

    /**
     * @param string $cDistrictName
     * @return self
     */
    public function setCDistrictName(string $cDistrictName): self
    {
        $this->cDistrictName = $cDistrictName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCDistrictAbbr(): string
    {
        return $this->cDistrictAbbr;
    }

    /**
     * @param string $cDistrictAbbr
     * @return self
     */
    public function setCDistrictAbbr(string $cDistrictAbbr): self
    {
        $this->cDistrictAbbr = $cDistrictAbbr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCDistrictFias(): string
    {
        return $this->cDistrictFias;
    }

    /**
     * @param string $cDistrictFias
     * @return self
     */
    public function setCDistrictFias(string $cDistrictFias): self
    {
        $this->cDistrictFias = $cDistrictFias;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCityName(): string
    {
        return $this->cCityName;
    }

    /**
     * @param string $cCityName
     * @return self
     */
    public function setCCityName(string $cCityName): self
    {
        $this->cCityName = $cCityName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCityAbbr(): string
    {
        return $this->cCityAbbr;
    }

    /**
     * @param string $cCityAbbr
     * @return self
     */
    public function setCCityAbbr(string $cCityAbbr): self
    {
        $this->cCityAbbr = $cCityAbbr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCityFias(): string
    {
        return $this->cCityFias;
    }

    /**
     * @param string $cCityFias
     * @return self
     */
    public function setCCityFias(string $cCityFias): self
    {
        $this->cCityFias = $cCityFias;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCommunityName(): string
    {
        return $this->cCommunityName;
    }

    /**
     * @param string $cCommunityName
     * @return self
     */
    public function setCCommunityName(string $cCommunityName): self
    {
        $this->cCommunityName = $cCommunityName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCommunityAbbr(): string
    {
        return $this->cCommunityAbbr;
    }

    /**
     * @param string $cCommunityAbbr
     * @return self
     */
    public function setCCommunityAbbr(string $cCommunityAbbr): self
    {
        $this->cCommunityAbbr = $cCommunityAbbr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCCommunityFias(): string
    {
        return $this->cCommunityFias;
    }

    /**
     * @param string $cCommunityFias
     * @return self
     */
    public function setCCommunityFias(string $cCommunityFias): self
    {
        $this->cCommunityFias = $cCommunityFias;
        return $this;
    }

    /**
     * @return string
     */
    public function getCStreetName(): string
    {
        return $this->cStreetName;
    }

    /**
     * @param string $cStreetName
     * @return self
     */
    public function setCStreetName(string $cStreetName): self
    {
        $this->cStreetName = $cStreetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCStreetAbbr(): string
    {
        return $this->cStreetAbbr;
    }

    /**
     * @param string $cStreetAbbr
     * @return self
     */
    public function setCStreetAbbr(string $cStreetAbbr): self
    {
        $this->cStreetAbbr = $cStreetAbbr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCStreetFias(): string
    {
        return $this->cStreetFias;
    }

    /**
     * @param string $cStreetFias
     * @return self
     */
    public function setCStreetFias(string $cStreetFias): self
    {
        $this->cStreetFias = $cStreetFias;
        return $this;
    }

    /**
     * @return string
     */
    public function getCHouseStr(): string
    {
        return $this->cHouseStr;
    }

    /**
     * @param string $cHouseStr
     * @return self
     */
    public function setCHouseStr(string $cHouseStr): self
    {
        $this->cHouseStr = $cHouseStr;
        return $this;
    }

    /**
     * @return string
     */
    public function getCAddrLost(): string
    {
        return $this->cAddrLost;
    }

    /**
     * @param string $cAddrLost
     * @return self
     */
    public function setCAddrLost(string $cAddrLost): self
    {
        $this->cAddrLost = $cAddrLost;
        return $this;
    }

    /**
     * @return string
     */
    public function getCStatusError(): string
    {
        return $this->cStatusError;
    }

    /**
     * @param string $cStatusError
     * @return self
     */
    public function setCStatusError(string $cStatusError): self
    {
        $this->cStatusError = $cStatusError;
        return $this;
    }

    /**
     * @return string
     */
    public function getCHouseError(): string
    {
        return $this->cHouseError;
    }

    /**
     * @param string $cHouseError
     * @return self
     */
    public function setCHouseError(string $cHouseError): self
    {
        $this->cHouseError = $cHouseError;
        return $this;
    }

    /**
     * @return string
     */
    public function getCHouseErrorDesc(): string
    {
        return $this->cHouseErrorDesc;
    }

    /**
     * @param string $cHouseErrorDesc
     * @return self
     */
    public function setCHouseErrorDesc(string $cHouseErrorDesc): self
    {
        $this->cHouseErrorDesc = $cHouseErrorDesc;
        return $this;
    }

    /**
     * @return string
     */
    public function getCKladr19(): string
    {
        return $this->cKladr19;
    }

    /**
     * @param string $cKladr19
     * @return self
     */
    public function setCKladr19(string $cKladr19): self
    {
        $this->cKladr19 = $cKladr19;
        return $this;
    }

    /**
     * @return string
     */
    public function getCGninmb(): string
    {
        return $this->cGninmb;
    }

    /**
     * @param string $cGninmb
     * @return self
     */
    public function setCGninmb(string $cGninmb): self
    {
        $this->cGninmb = $cGninmb;
        return $this;
    }

    /**
     * @return string
     */
    public function getCOkato(): string
    {
        return $this->cOkato;
    }

    /**
     * @param string $cOkato
     * @return self
     */
    public function setCOkato(string $cOkato): self
    {
        $this->cOkato = $cOkato;
        return $this;
    }

    /**
     * @return string
     */
    public function getCOktmo(): string
    {
        return $this->cOktmo;
    }

    /**
     * @param string $cOktmo
     * @return self
     */
    public function setCOktmo(string $cOktmo): self
    {
        $this->cOktmo = $cOktmo;
        return $this;
    }

    /**
     * @return string
     */
    public function getCAoguid(): string
    {
        return $this->cAoguid;
    }

    /**
     * @param string $cAoguid
     * @return self
     */
    public function setCAoguid(string $cAoguid): self
    {
        $this->cAoguid = $cAoguid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCAolevel(): string
    {
        return $this->cAolevel;
    }

    /**
     * @param string $cAolevel
     * @return self
     */
    public function setCAolevel(string $cAolevel): self
    {
        $this->cAolevel = $cAolevel;
        return $this;
    }

    /**
     * @return string
     */
    public function getCHouseguid(): string
    {
        return $this->cHouseguid;
    }

    /**
     * @param string $cHouseguid
     * @return self
     */
    public function setCHouseguid(string $cHouseguid): self
    {
        $this->cHouseguid = $cHouseguid;
        return $this;
    }

    /**
     * @return string
     */
    public function getCTimezone(): string
    {
        return $this->cTimezone;
    }

    /**
     * @param string $cTimezone
     * @return self
     */
    public function setCTimezone(string $cTimezone): self
    {
        $this->cTimezone = $cTimezone;
        return $this;
    }

    /**
     * @return IqdqCoordinates|null
     */
    public function getCCoordinate(): ?IqdqCoordinates
    {
        return $this->cCoordinate;
    }

    /**
     * @param IqdqCoordinates|null $cCoordinate
     * @return self
     */
    public function setCCoordinate(?IqdqCoordinates $cCoordinate): self
    {
        $this->cCoordinate = $cCoordinate;
        return $this;
    }

    /**
     * @return HouseDetails|null
     */
    public function getCJsonKvant(): ?HouseDetails
    {
        return $this->cJsonKvant;
    }

    /**
     * @param HouseDetails|null $cJsonKvant
     * @return self
     */
    public function setCJsonKvant(?HouseDetails $cJsonKvant): self
    {
        $this->cJsonKvant = $cJsonKvant;
        return $this;
    }
}
