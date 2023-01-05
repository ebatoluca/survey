<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\SurveyCategoryQuery;
use App\Models\Traits\Relations\SurveyCategoryRelations;
use App\Models\Traits\Storage\SurveyCategoryStorage;
use App\Models\Traits\Assignments\SurveyCategoryAssignment;
use App\Models\Traits\Operations\SurveyCategoryOperations;
use App\Models\Traits\Mutators\SurveyCategoryMutators;

class SurveyCategory extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SurveyCategoryQuery,
        SurveyCategoryRelations,
        SurveyCategoryStorage,
        SurveyCategoryAssignment,
        SurveyCategoryOperations,
        SurveyCategoryMutators;
        
    protected $fillable = [
        'name',
        'order',
        'survey_id',
    ];

    protected $creatable = [
        'name',
        'order',
        'survey_id',
    ];

    protected $updatable = [
        'name',
        'order',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
