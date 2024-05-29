<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static Member()
 */
final class UserRoles extends Enum implements LocalizedEnum
{
    const Seller = 1;
    const Broker = 2;

}
