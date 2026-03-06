<?php

namespace App\Enums;

enum Wheelbase: string
{
    case Short = 'short';
    case Medium = 'medium';
    case Long = 'long';
    case ExtraLong = 'extra_long';
}
