<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class OperationsTraitGenerator extends ModelTraitsGenerator
{

	protected $operationsTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setOperationsTraitFilename();

		$this->createOperationsTraitFile();

	}

	protected function setOperationsTraitFilename()
	{

		$this->operationsTraitFilename = $this->PascalCaseModelName . 'Operations.php';

	}

	protected function createOperationsTraitFile()
	{

		$operationsTraitFile = $this->modelTraitsPath . '/Operations/' . $this->operationsTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($operationsTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Operations/OperationsTemplate.txt';

			if(copy($templateFile, $operationsTraitFile)) {

				// Remplace dummy data
				$this->replaceData($operationsTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}