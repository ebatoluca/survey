<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\ClassroomQuery;
use App\Models\Traits\Relations\ClassroomRelations;
use App\Models\Traits\Storage\ClassroomStorage;
use App\Models\Traits\Assignments\ClassroomAssignment;
use App\Models\Traits\Operations\ClassroomOperations;
use App\Models\Traits\Mutators\ClassroomMutators;

class Classroom extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        ClassroomQuery,
        ClassroomRelations,
        ClassroomStorage,
        ClassroomAssignment,
        ClassroomOperations,
        ClassroomMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
