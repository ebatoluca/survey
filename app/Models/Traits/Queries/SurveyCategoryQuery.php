<?php

namespace App\Models\Traits\Queries;

use App\Models\SurveyCategory;

trait SurveyCategoryQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}