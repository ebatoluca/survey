<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class RelationsTraitGenerator extends ModelTraitsGenerator
{

	protected $relationsTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setRelationsTraitFilename();

		$this->createRelationsTraitFile();

	}

	protected function setRelationsTraitFilename()
	{

		$this->relationsTraitFilename = $this->PascalCaseModelName . 'Relations.php';

	}

	protected function createRelationsTraitFile()
	{

		$relationsTraitFile = $this->modelTraitsPath . '/Relations/' . $this->relationsTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($relationsTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Relations/RelationsTemplate.txt';

			if(copy($templateFile, $relationsTraitFile)) {

				// Remplace dummy data
				$this->replaceData($relationsTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}