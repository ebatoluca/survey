<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait CourseCategoryRelations
{
	
    public function parent()
    {
    	return $this->belongsTo('App\Models\CourseCategory', 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany('App\Models\CourseCategory', 'parent_id');
    }

    public function courses() 
    {
    	return $this->hasMany('App\Models\Course');
    }

}