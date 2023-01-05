<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\SurveyQuestionQuery;
use App\Models\Traits\Relations\SurveyQuestionRelations;
use App\Models\Traits\Storage\SurveyQuestionStorage;
use App\Models\Traits\Assignments\SurveyQuestionAssignment;
use App\Models\Traits\Operations\SurveyQuestionOperations;
use App\Models\Traits\Mutators\SurveyQuestionMutators;

class SurveyQuestion extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        SurveyQuestionQuery,
        SurveyQuestionRelations,
        SurveyQuestionStorage,
        SurveyQuestionAssignment,
        SurveyQuestionOperations,
        SurveyQuestionMutators;
        
    protected $fillable = [
        'text',
        'description',
        'type',
        'order',
        'payload',
        'survey_category_id',
    ];

    protected $creatable = [
        'text',
        'description',
        'type',
        'order',
        'survey_category_id',
    ];

    protected $updatable = [
        'text',
        'description',
        'type',
        'order',
        'survey_category_id',    
    ];

    protected $casts = [
        'payload' => 'json'
    ];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_types = [
        'text',
        'checkbox',
        'select',
        'radio',
    ];

}
