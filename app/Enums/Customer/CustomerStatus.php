<?php

namespace App\Enums\Customer;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Member()
 */
final class CustomerStatus extends Enum implements LocalizedEnum
{
    const Called = 1;
    const Unhandled = 2;
    const Recontact = 3;
}
