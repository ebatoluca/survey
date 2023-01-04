<?php

namespace App\Models\Traits\Queries;

use App\Models\CourseCategory;

trait CourseCategoryQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}