<?php

namespace App\Classes\Search;

class SearchBuilder
{

	public $modelName;

	public $request;


	public function __construct($modelName, $request)
	{

		$this->modelName = $modelName; // PENDIENTE: Implementar un método como getModel, 
									   // 		que valide que el modelo exista.

		$this->request = $this->getRequest($request);

	}

	private function getRequest($request)
	{

		if($request instanceof \Illuminate\Http\Request){
        
            return $request->merge([
            	'model' => $this->modelName
            ]);
        
        }elseif (is_array($request)){
        		
        	$request['model'] = $this->modelName;

            return $request;
        
        }else{
        
            return $request;
        
        }

	}

	private function applyFilters()
	{
		// Primero debemos recuperar el modelo al que le vamos a aplicar los métodos
		$model = $this->getModel();

		// Creamos nuestro QueryBuilder
		$query = $model->modelQuery();

		// Recuperamos los filtros que se deben aplicar a este modelo
		$filters = $this->getFilters();
		
		foreach ($filters as $key => $filter) {
			
			$filter = 'App\\Models\\Filters\\' . $this->modelName .  '\\'. $filter;

			if(class_exists($filter)) {

				// PENDIENTE: Valorar si se aplica un try...catch
				//            También valorar si se debe verificar que el filtro tenga el método apply 
				//            o esto se dede resolver mediante una interfaz para la clase filtro

				$query = $filter::apply($query, $this->request);

			}

		}

		return $query;

	}

	private function getModel() 
	{
		try{

			$model = app("App\Models\\" . $this->modelName);

			return $model;

		}catch(\Exception $e) {

			app_log($e);

			abort(500);

		}

	}

	private function getFilters()
	{

		// Arreglo para almacenar el nombre de los filtros
		$filtersNames = [];

		// Dir path
		$path = app_path('Models/Filters/' . $this->modelName);

		// Verificar que el directorio que deseamos inspeccionar exista
		if(file_exists($path)){

			// Recuperar en un arreglo todos los filtros disponibles en el directorio
			$allFilters = scandir($path);

			// Quitar del arreglo ./ y ../
			$filters = array_diff($allFilters, array('.', '..'));

			// Colcar cada filtro en el arreglo $filtersNames
			foreach ($filters as $key => $filter) {

				$filtersNames[] = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filter);

			}

		}

		return $filtersNames;

	}

	public function filter()
	{

		$query = $this->applyFilters();

		return $query;

	}

	public function get()
	{

		$query = $this->applyFilters();

		$query = ($this->request->paginate === 0 || $this->request->paginate == '0') ? 
			$query->get() : 
			$query->paginate($this->request->paginate ?? 10);

		return $query;

	}

}