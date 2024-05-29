<?php

namespace App\Enums\Article;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Published()
 * @method static static Draft()
 */
final class ArticleActiveStatus extends Enum implements LocalizedEnum
{
    const Published = 1;
    const Draft = 2;

    public function badge(): string
    {
        return match ($this) {
            self::Published => 'bg-green',
            self::Draft => '',
        };
    }
}
