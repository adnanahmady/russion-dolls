<?php

namespace App\Custom\Caching;

use Illuminate\Support\Facades\Cache;

class RussianDolls {
    protected static $keys = [];

    public static function setUp($model)
    {
        ob_start();
        static::$keys[] = $key = $model->getCacheKey();

        return Cache::tags('views')->has($key);
    }

    public static function tearDown()
    {
        $html = ob_get_clean();
        $key = array_pop(static::$keys);

        return Cache::tags('views')->rememberForever($key, function () use ($html) {
            return $html;
        });
    }
}
