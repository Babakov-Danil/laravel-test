<?php

namespace App\Http\Enums;

enum SortBy: string
{
    case SALARY = 'salary';
    case CREATED_AT = 'created_at';
    case null = 'null';
}
