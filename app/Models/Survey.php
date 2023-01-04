<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\SurveyQuery;
use App\Models\Traits\Relations\SurveyRelations;
use App\Models\Traits\Storage\SurveyStorage;
use App\Models\Traits\Assignments\SurveyAssignment;
use App\Models\Traits\Operations\SurveyOperations;
use App\Models\Traits\Mutators\SurveyMutators;

class Survey extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SurveyQuery,
        SurveyRelations,
        SurveyStorage,
        SurveyAssignment,
        SurveyOperations,
        SurveyMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
