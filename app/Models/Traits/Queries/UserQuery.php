<?php

namespace App\Models\Traits\Queries;

use App\Models\User;

trait UserQuery
{

	public function modelQuery()
	{
		
		$query = $this->newQuery();

		return $query;

	}

}