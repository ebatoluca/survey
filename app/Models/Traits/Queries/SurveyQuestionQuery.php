<?php

namespace App\Models\Traits\Queries;

use App\Models\SurveyQuestion;

trait SurveyQuestionQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}