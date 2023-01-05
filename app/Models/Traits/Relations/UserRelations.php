<?php

namespace App\Models\Traits\Relations;

// use \Znck\Eloquent\Traits\BelongsToThrough; // Docs: https://github.com/staudenmeir/belongs-to-through
// use \Staudenmeir\EloquentHasManyDeep\HasRelationships; // Docs: https://github.com/staudenmeir/eloquent-has-many-deep

trait UserRelations
{
	
    public function student()
    {
    	return $this->hasOne('App\Models\Student');
    }

    public function teacher()
    {
    	return $this->hasOne('App\Models\Teacher');
    }

    public function metas()
    {
    	return $this->hasMany('App\Models\UserMeta');
    }

}