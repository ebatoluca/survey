<?php

namespace App\Models\Traits\Queries;

use App\Models\Classroom;

trait ClassroomQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}