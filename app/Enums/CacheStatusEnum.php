<?php

namespace App\Enums;

enum CacheStatusEnum: string
{
    case MISS = 'miss';
    case EXIST = 'exist';
}
