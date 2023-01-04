<?php

namespace App\Classes\Generator\Backend\Requests;

use App\Classes\Generator\AutoGenerator;

class RequestsGenerator extends AutoGenerator
{

	protected $mainRequestsPath;

	protected $requests = [
		'CreateRequest',
		'DeleteRequest',
		'ExportRequest',
		'ForceDeleteRequest',
		'IndexRequest',
		'PoliciesRequest',
		'PolicyRequest',
		'RestoreRequest',
		'ShowRequest',
		'UpdateRequest'
	];

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->createBaseDir();

		$this->createRequestsFiles();

	}

	protected function createBaseDir()
	{

		$path = $this->requestPath . '/' . $this->PascalCaseModelName;

		if (!file_exists($path)) mkdir($path, 0777, true);

		$this->mainRequestsPath = $path;

	}

	protected function createRequestsFiles()
	{	

		foreach($this->requests as $request) {

			$this->createRequestFile($request);

		}

	}

	protected function createRequestFile($requestName)
	{

		$requestFile = $this->mainRequestsPath . '/' . $requestName . '.php';

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($requestFile)) {

			$templateFile = $this->requestsTemplatePath . '/' . $requestName . '.txt';

			if(copy($templateFile, $requestFile)) {

				// Remplace dummy data
				$this->replaceData($requestFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}