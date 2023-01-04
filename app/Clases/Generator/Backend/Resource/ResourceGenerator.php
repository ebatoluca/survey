<?php

namespace App\Classes\Generator\Backend\Resource;

use App\Classes\Generator\AutoGenerator;

class ResourceGenerator extends AutoGenerator
{

	protected $resourceFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setResourceFilename();

		$this->createResourceFile();

	}

	protected function setResourceFilename()
	{

		$this->resourceFilename = $this->PascalCaseModelName . 'Resource.php';

	}

	protected function createResourceFile()
	{

		$resourceFile = $this->resourcePath . '/' . $this->resourceFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($resourceFile)) {

			$templateFile = $this->resourceTemplatePath . '/ResourceTemplate.txt';

			if(copy($templateFile, $resourceFile)) {

				// Remplace dummy data
				$this->replaceData($resourceFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}