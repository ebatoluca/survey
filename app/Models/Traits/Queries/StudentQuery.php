<?php

namespace App\Models\Traits\Queries;

use App\Models\Student;

trait StudentQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}