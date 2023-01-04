<?php

namespace App\Classes\Generator\Frontend\AdminRoute;

use App\Classes\Generator\AutoGenerator;

class AdminRouteGenerator extends AutoGenerator
{

	protected $adminRouteFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setFilename();

		$this->createFile();

	}

	protected function setFilename()
	{

		$this->adminRouteFilename = $this->snake_case_model_name . '.js';

	}

	protected function createFile()
	{

		$adminRouteFile = $this->adminRoutePath . '/' . $this->adminRouteFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($adminRouteFile)) {

			$templateFile = $this->adminRouteTemplatePath . '/AdminRouteTemplate.txt';

			if(copy($templateFile, $adminRouteFile)) {

				// Remplace dummy data
				$this->replaceData($adminRouteFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}