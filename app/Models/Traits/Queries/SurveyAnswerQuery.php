<?php

namespace App\Models\Traits\Queries;

use App\Models\SurveyAnswer;

trait SurveyAnswerQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}