<?php

namespace ApiDQ\Model\Service\Phone;

use ApiDQ\Model\BaseModel;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 *
 */
class CleanResponse extends BaseModel
{
    /**
     *
     */
    protected string $original = '';
    /**
     *
     */
    protected string $international = '';
    /**
     *
     */
    protected string $national = '';
    /**
     * @SerializedName("E164")
     */
    protected string $e164 = '';
    /**
     * @SerializedName("RFC3966")
     */
    protected string $rfc3966 = '';
    /**
     *
     */
    protected string $carrier = '';
    /**
     * Телефонный код страны. Например, для РФ 7
     */
    protected int $countryCode = 0;
    /**
     * Код страны Alpha-2
     */
    protected string $country = '';
    /**
     *
     */
    protected string $areaCode = '';
    /**
     * @var array<string>
     */
    protected array $timezones;
    /**
     *
     */
    protected string $geocoding = '';
    /**
     *
     */
    protected string $subscriberNumber = '';
    /**
     *
     */
    protected string $type = Type::UNKNOWN;
    /**
     * Возможно
     */
    protected bool $possible = false;
    /**
     * Точно
     */
    protected bool $valid = false;

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
    public function getInternational(): string
    {
        return $this->international;
    }

    /**
     * @param string $international
     * @return self
     */
    public function setInternational(string $international): self
    {
        $this->international = $international;
        return $this;
    }

    /**
     * @return string
     */
    public function getNational(): string
    {
        return $this->national;
    }

    /**
     * @param string $national
     * @return self
     */
    public function setNational(string $national): self
    {
        $this->national = $national;
        return $this;
    }

    /**
     * @return string
     */
    public function getE164(): string
    {
        return $this->e164;
    }

    /**
     * @param string $e164
     * @return self
     */
    public function setE164(string $e164): self
    {
        $this->e164 = $e164;
        return $this;
    }

    /**
     * @return string
     */
    public function getRfc3966(): string
    {
        return $this->rfc3966;
    }

    /**
     * @param string $rfc3966
     * @return self
     */
    public function setRfc3966(string $rfc3966): self
    {
        $this->rfc3966 = $rfc3966;
        return $this;
    }

    /**
     * @return string
     */
    public function getCarrier(): string
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     * @return self
     */
    public function setCarrier(string $carrier): self
    {
        $this->carrier = $carrier;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    /**
     * @param int $countryCode
     * @return self
     */
    public function setCountryCode(int $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return self
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getAreaCode(): string
    {
        return $this->areaCode;
    }

    /**
     * @param string $areaCode
     * @return self
     */
    public function setAreaCode(string $areaCode): self
    {
        $this->areaCode = $areaCode;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getTimezones(): array
    {
        return $this->timezones;
    }

    /**
     * @param string[] $timezones
     * @return self
     */
    public function setTimezones(array $timezones): self
    {
        $this->timezones = $timezones;
        return $this;
    }

    /**
     * @return string
     */
    public function getGeocoding(): string
    {
        return $this->geocoding;
    }

    /**
     * @param string $geocoding
     * @return self
     */
    public function setGeocoding(string $geocoding): self
    {
        $this->geocoding = $geocoding;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscriberNumber(): string
    {
        return $this->subscriberNumber;
    }

    /**
     * @param string $subscriberNumber
     * @return self
     */
    public function setSubscriberNumber(string $subscriberNumber): self
    {
        $this->subscriberNumber = $subscriberNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPossible(): bool
    {
        return $this->possible;
    }

    /**
     * @param bool $possible
     * @return self
     */
    public function setPossible(bool $possible): self
    {
        $this->possible = $possible;
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
}
