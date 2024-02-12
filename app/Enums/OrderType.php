<?php

namespace App\Enums;

abstract class OrderType
{
    const COD = 'cod';
    const CARD = 'card';
    const UPI = 'upi';

    const ALL_TYPES = [
        self::COD,
        self::CARD,
        self::UPI,
    ];

    const INITIAL_TYPE = self::COD;
}
