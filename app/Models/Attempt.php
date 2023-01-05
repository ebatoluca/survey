<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\AttemptQuery;
use App\Models\Traits\Relations\AttemptRelations;
use App\Models\Traits\Storage\AttemptStorage;
use App\Models\Traits\Assignments\AttemptAssignment;
use App\Models\Traits\Operations\AttemptOperations;
use App\Models\Traits\Mutators\AttemptMutators;

class Attempt extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        AttemptQuery,
        AttemptRelations,
        AttemptStorage,
        AttemptAssignment,
        AttemptOperations,
        AttemptMutators;
        
    protected $fillable = [
        'status',
        'period_id',
        'student_id',
        'classroom_id',
        'survey_id',
    ];

    protected $creatable = [
        'status',
        'period_id',
        'student_id',
        'classroom_id',
        'survey_id',
    ];

    protected $updatable = [
        'status',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

    public $allowed_status = [
        'started',
        'finished',
        'unfinished', // No resuelto en más de 2 días.
    ];

}
