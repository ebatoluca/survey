<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait ClassroomRelations
{
	
    public function course()
    {
    	return $this->belongsTo('App\Models\Course');
    }

    public function attempts()
    {
        return $this->hasMany('App\Models\Attmpt');
    }

    public function surveys()
    {
        return $this->belongsToMany('App\Models\Survey');
    }   

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

}