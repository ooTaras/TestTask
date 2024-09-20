<?php

namespace App\Enums;

enum JobStateEnum: string
{
    case QUEUED = '0';
    case PROCESSING = '1';
    case PROCESSED = '2';
    case FAILED = '3';
}
