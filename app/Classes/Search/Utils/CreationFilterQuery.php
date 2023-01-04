<?php 

namespace App\Classes\Search\Utils;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreationFilterQuery
{

	public static function sort(Builder $query, Request $request)
	{

		if ($request->created_at) {

            $date = Carbon::parse($request->created_at);

            if($request->operator == '>') {

                $query->whereDate('created_at', '>', $date);

            }

            if($request->operator == '>=') {

                $query->whereDate('created_at', '>=', $date);

            }
        
            if($request->operator == '<') {

                $query->whereDate('created_at', '<', $date);

            }

            if($request->operator == '<=') {

                $query->whereDate('created_at', '<=', $date);

            }

            if($request->operator == '==') {

                $query->whereDate('created_at', '=', $date);

            }

            if($request->operator == '!=') {

                $query->whereDate('created_at', '!=', $date);

            }

        }

        if($request->created_at_start_date && $request->created_at_end_date) {

            $created_at_start_date = Carbon::parse($request->created_at_start_date);

            $created_at_end_date = Carbon::parse($request->created_at_end_date);

            $query->whereDate('created_at', '>=', $created_at_start_date)
            	->whereDate('created_at', '<=', $created_at_end_date);

        }

        return $query;

	}

}