<?php

namespace App\Enums\CommissionDetail;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Member()
 */
final class CommissionDetailType extends Enum implements LocalizedEnum
{
    const DirectCommission = 1;
    const InDirectCommission = 2;
}

