<?php

namespace ApiDQ\Model\Service\Name;

use UnexpectedValueException;

/**
 */
class NameType
{
    /**
     * Неизвестно
     */
    public const UNKNOWN = 'UNKNOWN';
    /**
     * Фамилия
     */
    public const SURNAME = 'SURNAME';
    /**
     * Имя
     */
    public const NAME = 'NAME';
    /**
     * Отчество
     */
    public const PATRONYMIC = 'PATRONYMIC';

    /**
     * @return string[]
     */
    public static function getNameTypes(): array
    {
        return [
            self::UNKNOWN,
            self::SURNAME,
            self::NAME,
            self::PATRONYMIC,
        ];
    }

    public static function exists(string $nameType): bool
    {
        return in_array($nameType, self::getNameTypes(), true);
    }

    public static function check(string $nameType): void
    {
        if (!self::exists($nameType)) {
            throw new UnexpectedValueException('Enum: invalid NameType value');
        }
    }
}
