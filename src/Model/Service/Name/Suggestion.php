<?php

namespace ApiDQ\Model\Service\Name;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class Suggestion extends BaseModel
{
    /**
     * Текст подсказки
     */
    protected string $result = '';
    /**
     * Язык подсказки ISO 3661 Alpha-2 (https://www.iso.org/iso-3166-country-codes.html)
     */
    protected string $lang = '';
    /**
     * Пол объекта подсказки
     */
    protected string $gender = Gender::UNKNOWN;

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
    public function getLang(): string
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return self
     */
    public function setLang(string $lang): self
    {
        $this->lang = $lang;
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
}
