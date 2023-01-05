<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SurveyRelations
{
	
    public function classrooms()
    {
    	return $this->belongsToMany('App\Models\Classroom');
    }

    public function categories()
    {
    	return $this->hasMany('App\Models\SurveyCategory');
    }

    public function attempts()
    {
    	return $this->hasMany('App\Models\Attempt');
    }

    public function metas()
    {
    	return $this->hasMany('App\Models\SurveyMeta');
    }

}