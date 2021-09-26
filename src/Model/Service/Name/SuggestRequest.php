<?php

namespace ApiDQ\Model\Service\Name;

use ApiDQ\Model\BaseModel;
use ApiDQ\Model\Service\Name\NameType;

/**
 *
 */
class SuggestRequest extends BaseModel
{
    /**
     * Поисковой запрос
     */
    protected string $query = '';
    /**
     * Тип подсказки
     */
    protected string $type = '';
    /**
     * Максимальное количество подсказок
     */
    protected int $count = 0;

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     * @return self
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;
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
        NameType::check($type);
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return self
     */
    public function setCount(int $count): self
    {
        $this->count = $count;
        return $this;
    }
}
