<?php

namespace App\Models\Traits\Queries;

use App\Models\Teacher;

trait TeacherQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}