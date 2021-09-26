<?php

namespace ApiDQ\TestUtils;

class TestConfig
{
    /**
     * @return string
     */
    public static function getApiUrl(): string
    {
        return self::getenv('API_URL', 'https://api.apidq.io/');
    }

    /**
     * @return string
     */
    public static function getApiToken(): string
    {
        return self::getenv('API_TOKEN', 'emptyToken');
    }

    /**
     * @return string
     */
    public static function getCacheDir(): string
    {
        return self::getenv('CACHE_DIR', sys_get_temp_dir());
    }

    /**
     * @param string $variable
     * @param mixed $default
     *
     * @return mixed|null
     */
    private static function getenv(string $variable, $default = null)
    {
        if (!array_key_exists($variable, $_ENV)) {
            return $default;
        }

        return $_ENV[$variable];
    }
}
