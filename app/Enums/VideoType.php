<?php

namespace App\Enums;

enum VideoType
{
    const MOVIE = 1;
    const WEB_VIDEO = 2;
    const SERIES = 3;

    public static function toString($v)
    {
        switch ($v) {
            case self::MOVIE:
                return "movie";
            case self::WEB_VIDEO:
                return "web video";
            case self::SERIES:
                return "series";
        }
    }

    public static function getValues(): array
    {
        return [self::MOVIE, self::WEB_VIDEO, self::SERIES];
    }

}
