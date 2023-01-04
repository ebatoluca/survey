<?php

namespace App\Classes\Generator\Backend\ModelTraits\Traits;

use App\Classes\Generator\Backend\ModelTraits\ModelTraitsGenerator;

class StorageTraitGenerator extends ModelTraitsGenerator
{

	protected $storageTraitFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setStorageTraitFilename();

		$this->createStorageTraitFile();

	}

	protected function setStorageTraitFilename()
	{

		$this->storageTraitFilename = $this->PascalCaseModelName . 'Storage.php';

	}

	protected function createStorageTraitFile()
	{

		$storageTraitFile = $this->modelTraitsPath . '/Storage/' . $this->storageTraitFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($storageTraitFile)) {

			$templateFile = $this->modelTraitsTemplatePath . '/Storage/StorageTemplate.txt';

			if(copy($templateFile, $storageTraitFile)) {

				// Remplace dummy data
				$this->replaceData($storageTraitFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}