<?php

namespace App\Models\Filters\Survey;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Classes\Search\Utils\Order;

class IdFilter
{

    public static function apply(Builder $query, Request $request)
    {

        if ($request->id) {

            $query->where('id', $request->id);

        }

        $query = Order::orderBy($query, $request, 'id');

        return $query;

    }

}
