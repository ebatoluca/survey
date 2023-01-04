<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class MutatorsTraitGenerator extends ModelTraitsGenerator
{

	protected $mutatorsTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setMutatorsTraitFilename();

		$this->createMutatorsTraitFile();

	}

	protected function setMutatorsTraitFilename()
	{

		$this->mutatorsTraitFilename = $this->PascalCaseModelName . 'Mutators.php';

	}

	protected function createMutatorsTraitFile()
	{

		$mutatorsTraitFile = $this->modelTraitsPath . '/Mutators/' . $this->mutatorsTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($mutatorsTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Mutators/MutatorsTemplate.txt';

			if(copy($templateFile, $mutatorsTraitFile)) {

				// Remplace dummy data
				$this->replaceData($mutatorsTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}