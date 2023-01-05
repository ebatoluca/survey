<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait AttemptRelations
{
	
    public function survey()
    {
    	return $this->belongsTo('App\Models\Survey');
    }

    public function period()
    {
    	return $this->belongsTo('App\Models\Period');
    }

    public function student()
    {
    	return $this->belongsTo('App\Models\Student');
    }

    public function answers()
    {
    	return $this->hasMany('App\Modles\SurveyAnswers');
    }

    public function classroom()
    {
    	return $this->belongsTo('App\Models\Classroom');
    }

}