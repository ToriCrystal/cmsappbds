<?php

namespace App\Enums\CommissionDetail;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Member()
 */
final class CommissionDetailStatus extends Enum implements LocalizedEnum
{
    const Waiting = 1;
    const Approved = 2;
    const Rejected = 3;
}

