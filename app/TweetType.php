<?php

namespace App;

enum TweetType: string
{
    case RETWEET = 'retweet';
    case QUOTE = 'quote';
    case TWEET = 'tweet';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
