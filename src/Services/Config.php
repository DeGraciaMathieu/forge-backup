<?php

namespace App\Services;

class Config
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }

        $array = $this->items;

        if (is_null($key)) {
            return $array;
        }

        foreach (explode('.', $key) as $segment) {
            if (array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $default;
            }
        }

        return $array;
    }
}
