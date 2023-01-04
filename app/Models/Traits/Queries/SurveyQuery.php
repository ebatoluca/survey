<?php

namespace App\Models\Traits\Queries;

use App\Models\Survey;

trait SurveyQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}