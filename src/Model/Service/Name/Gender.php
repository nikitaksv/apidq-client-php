<?php

namespace ApiDQ\Model\Service\Name;

use UnexpectedValueException;

/**
 */
class Gender
{
    /**
     * Неизвестно
     */
    public const UNKNOWN = 'UNKNOWN';
    /**
     * Мужчина
     */
    public const MALE = 'MALE';
    /**
     * Женщина
     */
    public const FEMALE = "FEMALE";

    /**
     * @return string[]
     */
    public static function getGenders(): array
    {
        return [
            self::UNKNOWN,
            self::MALE,
            self::FEMALE,
        ];
    }

    public static function exists(string $gender): bool
    {
        return in_array($gender, self::getGenders(), true);
    }

    public static function check(string $gender): void
    {
        if (!self::exists($gender)) {
            throw new UnexpectedValueException('Enum: invalid Gender value');
        }
    }
}
