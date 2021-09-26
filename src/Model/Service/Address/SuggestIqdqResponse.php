<?php

namespace ApiDQ\Model\Service\Address;

use ApiDQ\Model\BaseModel;

/**
 *
 */
class SuggestIqdqResponse extends BaseModel
{
    /**
     * Подсказки
     * @var array<CleanIqdqResponse>
     */
    protected array $suggestions = [];

    /**
     * @return array<CleanIqdqResponse>
     */
    public function getSuggestions(): array
    {
        return $this->suggestions;
    }

    /**
     * @param array<CleanIqdqResponse> $suggestions
     * @return self
     */
    public function setSuggestions(array $suggestions): self
    {
        $this->suggestions = $suggestions;
        return $this;
    }
}
