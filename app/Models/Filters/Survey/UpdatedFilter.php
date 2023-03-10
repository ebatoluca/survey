<?php

namespace App\Models\Filters\Survey;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Classes\Search\Utils\Order;
use App\Classes\Search\Utils\UpdatedFilterQuery;

class UpdatedFilter
{

    public static function apply(Builder $query, Request $request)
    {

        $query = UpdatedFilterQuery::sort($query, $request);

        $query = Order::orderBy($query, $request, 'updated_at');

        return $query;

    }

}
