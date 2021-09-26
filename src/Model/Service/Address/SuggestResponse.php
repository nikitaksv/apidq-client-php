<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class SuggestResponse extends BaseModel
{
    /**
     * Подсказки
     * @var array<Suggestion>
     */
    protected array $suggestions = [];

    /**
     * @return array<Suggestion>
     */
    public function getSuggestions(): array
    {
        return $this->suggestions;
    }

    /**
     * @param array<Suggestion> $suggestions
     * @return self
     */
    public function setSuggestions(array $suggestions): self
    {
        $this->suggestions = $suggestions;
        return $this;
    }
}
