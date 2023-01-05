<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait SurveyAnswerRelations
{
	
    public function question()
    {
    	return $this->belongsTo('App\Models\SurveyQuestion', 'survey_question_id');
    }

    public function attempt()
    {
    	return $this->belongsTo('App\Models\Attempt');
    }

    public function metas()
    {
    	return $this->hasMany('App\Models\SurveyAnswerMeta');
    }

}