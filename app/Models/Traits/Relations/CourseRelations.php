<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CourseRelations
{
	
    public function category()
    {
    	return $this->belongsTo('App\Models\CourseCategory', 'course_category_id');
    }

    public function classrooms()
    {
    	return $this->hasMany('App\Models\Classroom');
    }

}