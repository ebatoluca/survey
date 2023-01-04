<?php

namespace App\Classes\Generator\Backend\Route;

use App\Classes\Generator\AutoGenerator;

class RouteGenerator extends AutoGenerator
{

	protected $routeFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setRouteFilename();

		$this->createRouteFile();

	}

	protected function setRouteFilename()
	{

		$this->routeFilename = $this->snake_case_model_name . '.php';

	}

	protected function createRouteFile()
	{

		$routeFile = $this->apiRoutepath . '/' . $this->routeFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($routeFile)) {

			$templateFile = $this->routeTemplatePath . '/RouteTemplate.txt';

			if(copy($templateFile, $routeFile)) {

				// Remplace dummy data
				$this->replaceData($routeFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}