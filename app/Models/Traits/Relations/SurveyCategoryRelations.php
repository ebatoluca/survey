<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SurveyCategoryRelations
{
	
    public function survey()
    {
    	return $this->belongsTo('App\Models\Survey');
    }

    public function questions()
    {
    	return $this->hasMany('App\Models\SurveyQuestion');
    }

}