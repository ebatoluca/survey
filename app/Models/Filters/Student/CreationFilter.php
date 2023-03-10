<?php

namespace App\Models\Filters\Student;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Classes\Search\Utils\Order;
use App\Classes\Search\Utils\CreationFilterQuery;

class CreationFilter
{

    public static function apply(Builder $query, Request $request)
    {

        $query = CreationFilterQuery::sort($query, $request);

        $query = Order::orderBy($query, $request, 'created_at');

        return $query;

    }

}
