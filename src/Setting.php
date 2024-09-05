<?php

namespace SimpleAnalytics;

class Setting
{
    public static function get(string $key, $default = null): mixed
    {
        $value = get_option($key);

        if (empty($value)) {
            return $default;
        }

        return $value;
    }

    public static function boolean(string $key): bool
    {
        return (bool)self::get($key, false);
    }
}
