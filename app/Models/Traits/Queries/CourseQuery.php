<?php

namespace App\Models\Traits\Queries;

use App\Models\Course;

trait CourseQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}