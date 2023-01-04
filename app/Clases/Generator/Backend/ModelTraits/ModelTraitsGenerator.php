<?php

namespace App\Classes\Generator\Backend\ModelTraits;

use App\Classes\Generator\AutoGenerator;

class ModelTraitsGenerator extends AutoGenerator
{

	public function __construct(string $ModelName)
	{

		parent::__construct($ModelName);

		$this->createBaseDirs();

	}

	protected function createBaseDirs()
	{

		$assignmentsDir = base_path('app/Models/Traits/Assignments');

		if (!file_exists($assignmentsDir)) mkdir($assignmentsDir, 0777, true);


		$mutatorsDir = base_path('app/Models/Traits/Mutators');

		if (!file_exists($mutatorsDir)) mkdir($mutatorsDir, 0777, true);

		
		$operationsDir = base_path('app/Models/Traits/Operations');

		if (!file_exists($operationsDir)) mkdir($operationsDir, 0777, true);

		
		$queriesDir = base_path('app/Models/Traits/Queries');

		if (!file_exists($queriesDir)) mkdir($queriesDir, 0777, true);

		
		$relationsDir = base_path('app/Models/Traits/Relations');

		if (!file_exists($relationsDir)) mkdir($relationsDir, 0777, true);


		$storageDir = base_path('app/Models/Traits/Storage');

		if (!file_exists($storageDir)) mkdir($storageDir, 0777, true);

	}

}