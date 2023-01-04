<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\SurveyAnswerQuery;
use App\Models\Traits\Relations\SurveyAnswerRelations;
use App\Models\Traits\Storage\SurveyAnswerStorage;
use App\Models\Traits\Assignments\SurveyAnswerAssignment;
use App\Models\Traits\Operations\SurveyAnswerOperations;
use App\Models\Traits\Mutators\SurveyAnswerMutators;

class SurveyAnswer extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SurveyAnswerQuery,
        SurveyAnswerRelations,
        SurveyAnswerStorage,
        SurveyAnswerAssignment,
        SurveyAnswerOperations,
        SurveyAnswerMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
