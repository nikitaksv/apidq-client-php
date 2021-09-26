<?php

namespace ApiDQ\Model\Service\Name;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class CleanResponse extends BaseModel
{
    /**
     * Оригинальное значение
     */
    protected string $original = '';
    /**
     * Стандартизированные данные
     */
    protected string $result = '';
    /**
     * Фамилия
     */
    protected string $lastName = '';
    /**
     * Имя
     */
    protected string $firstName = '';
    /**
     * Отчество
     */
    protected string $middleName = '';
    /**
     * Пол
     */
    protected string $gender = Gender::UNKNOWN;
    /**
     * Неразобранные части
     * @var array<string>
     */
    protected array $unparsedParts = [];
    /**
     * Качество: возможный
     */
    protected bool $possible = false;
    /**
     * Качество: действительный
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
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @param string $result
     * @return self
     */
    public function setResult(string $result): self
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return self
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     * @return self
     */
    public function setMiddleName(string $middleName): self
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return self
     */
    public function setGender(string $gender): self
    {
        Gender::check($gender);
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getUnparsedParts(): array
    {
        return $this->unparsedParts;
    }

    /**
     * @param array<string> $unparsedParts
     * @return self
     */
    public function setUnparsedParts(array $unparsedParts): self
    {
        $this->unparsedParts = $unparsedParts;
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
