<?php

namespace App\Http\Enums;
enum SortType: string
{
    case DESC = 'desc';
    case ASC = 'asc';
    case null = 'null';
}
