<?php

namespace App\Models\Traits\Queries;

use App\Models\Attempt;

trait AttemptQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}