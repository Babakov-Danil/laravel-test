<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'requirements',
        'salary',
    ];

    protected $guarded = false;

    /**
     * @param array{sort_by: string, sort_type: string} $sort
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function sortBy(array $sort)
    {
        $query = (new static())::query();

        if (
            isset($sort) &&
            isset($sort['sort_by']) &&
            $sort['sort_by'] != 'null'
        ) {
            $query->orderBy($sort['sort_by'], $sort['sort_type'] ?? 'asc');
        }

        return $query->paginate(10);
    }
}
