<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 * Информация части адреса
 */
class Part extends BaseModel
{
    /**
     * Название с типом
     */
    protected string $fullName = '';
    /**
     * Название
     */
    protected string $name = '';
    /**
     * Тип
     */
    protected string $type = '';
    /**
     * Найденные коды части адреса
     */
    protected ?Codes $codes = null;

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
     * @return Codes|null
     */
    public function getCodes(): ?Codes
    {
        return $this->codes;
    }

    /**
     * @param Codes|null $codes
     * @return self
     */
    public function setCodes(?Codes $codes): self
    {
        $this->codes = $codes;
        return $this;
    }
}
