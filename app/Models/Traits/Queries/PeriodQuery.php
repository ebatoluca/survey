<?php

namespace App\Models\Traits\Queries;

use App\Models\Period;

trait PeriodQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}