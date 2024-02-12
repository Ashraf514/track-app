<?php

namespace App\Enums;

abstract class OrderStatus
{
    const ORDERD = 'ordered';
    const SHIPPED = 'shipped';
    const ON_THE_WAY = 'on_the_way';
    const DELIVERED = 'delivered';

    const ALL_TYPES = [
        self::ORDERD,
        self::SHIPPED,
        self::ON_THE_WAY,
        self::DELIVERED
    ];

    const INITIAL_TYPE = self::ORDERD;
}
