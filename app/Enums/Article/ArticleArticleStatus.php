<?php

namespace App\Enums\Article;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Published()
 * @method static static Draft()
 */
final class ArticleArticleStatus extends Enum implements LocalizedEnum
{
    const Waiting = 1;
    const Approved = 2;
    const Cancel = 3;
}
