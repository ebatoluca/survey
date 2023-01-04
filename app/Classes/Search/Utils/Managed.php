<?php 

namespace App\Classes\Search\Utils;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class Managed
{

	public static function apply(Builder $query, Request $request)
    {   

        // 1. Primero debemos ver si se requiere las entidades administrables por el usuario
        if (auth()->check() && $request->managed == true) {

            // Depués debemos verificar si se requiere hacer una excepción para los que puedan ver todas
            if($request->except_view_any == true) {

                // Si el usuario no puede ver todas, limitar a las que puede administrar
                if(user()->cant('viewAny', 'App\Models\\' . $request->model)) {

                    $query = self::canViewConstraint($query, user(), $request);

                }

            // En caso de que no se requiera hacer la excepción de todas formas hacer la restricción
            } else {

                $query = self::canViewConstraint($query, user(), $request);

            }

        }

        return $query;

    }

    public static function canViewConstraint($query, $user, $request) 
    {

        $filter = 'App\\Models\Filters\\' . $request->model . '\ManagedFilter';

        if(class_exists($filter)) {

            $query = $filter::canView($query, user(), $request->all());

        }

        return $query;

    }

}