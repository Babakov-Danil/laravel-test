<?php

namespace App\Http\Enums;

enum DynamicFields: string
{
    case REQUIREMENTS = 'requirements';
    case CREATED_AT = 'created_at';
    case UPDATED_AT = 'updated_at';
}
