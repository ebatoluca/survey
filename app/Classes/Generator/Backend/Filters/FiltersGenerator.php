<?php

namespace App\Classes\Generator\Backend\Filters;

use App\Classes\Generator\AutoGenerator;

class FiltersGenerator extends AutoGenerator
{

	protected $mainFiltersPath;

	protected $filters = [
		'CreationFilter',
		'EagerLoadingFilter',
		'IdFilter',
		'ManagedFilter',
		'UpdatedFilter',
	];

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->createBaseDir();

		$this->createFiltersFiles();

	}

	protected function createBaseDir()
	{

		$path = $this->filtersPath . '/' . $this->PascalCaseModelName;

		if (!file_exists($path)) mkdir($path, 0777, true);

		$this->mainFiltersPath = $path;

	}

	protected function createFiltersFiles()
	{	

		foreach($this->filters as $filter) {

			$this->createRequestFile($filter);

		}

	}

	protected function createRequestFile($filterName)
	{

		$filterFile = $this->mainFiltersPath . '/' . $filterName . '.php';

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($filterFile)) {

			$templateFile = $this->filtersTemplatePath . '/' . $filterName . 'Template.txt';

			if(copy($templateFile, $filterFile)) {

				// Remplace dummy data
				$this->replaceData($filterFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}