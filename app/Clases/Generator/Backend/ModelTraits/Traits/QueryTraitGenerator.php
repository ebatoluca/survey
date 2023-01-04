<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class QueryTraitGenerator extends ModelTraitsGenerator
{

	protected $queryTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setQueryTraitFilename();

		$this->createQueryTraitFile();

	}

	protected function setQueryTraitFilename()
	{

		$this->queryTraitFilename = $this->PascalCaseModelName . 'Query.php';

	}

	protected function createQueryTraitFile()
	{

		$queryTraitFile = $this->modelTraitsPath . '/Queries/' . $this->queryTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($queryTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Queries/QueryTemplate.txt';

			if(copy($templateFile, $queryTraitFile)) {

				// Remplace dummy data
				$this->replaceData($queryTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}