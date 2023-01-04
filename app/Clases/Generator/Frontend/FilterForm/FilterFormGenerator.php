<?php

namespace App\Classes\Generator\Frontend\FilterForm;

use App\Classes\Generator\AutoGenerator;

class FilterFormGenerator extends AutoGenerator
{

	protected $filterFormFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->filterFormFilename = $this->PascalCaseModelName . 'FilterForm.vue';

	}

	protected function createFile()
	{

		$filterFormFile = $this->filterFormPath . '/' . $this->filterFormFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($filterFormFile)) {

			$templateFile = $this->filterFormTemplatePath . '/FilterFormTemplate.txt';

			if(copy($templateFile, $filterFormFile)) {

				// Remplace dummy data
				$this->replaceData($filterFormFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}