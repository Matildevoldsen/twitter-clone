<?php

namespace App;

enum EntityType: string
{
    case HASHTAG = 'hashtag';
    case MENTION = 'mention';

    case URL = 'url';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
