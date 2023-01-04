<?php

namespace App\Classes\Generator\Backend\Policy;

use App\Classes\Generator\AutoGenerator;

class PolicyGenerator extends AutoGenerator
{

	protected $policyFilename;

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->setPolicyFilename();

		$this->createPolicyFile();

	}

	protected function setPolicyFilename()
	{

		$this->policyFilename = $this->PascalCaseModelName . 'Policy.php';

	}

	protected function createPolicyFile()
	{

		$policyFile = $this->policyPath . '/' . $this->policyFilename;

		// Solo proceder en caso de los archivos no existan
		if(!file_exists($policyFile)) {

			$templateFile = $this->policyTemplatePath . '/PolicyTemplate.txt';

			if(copy($templateFile, $policyFile)) {

				// Remplace dummy data
				$this->replaceData($policyFile);

			} else {

				// PENDIENTE: Mandar un mensaje de error

			}

		} else {

			// PENDIENTE: Mandar un mensaje de que no el controlador ya existía

		}

	}

}