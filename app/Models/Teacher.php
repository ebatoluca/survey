<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\TeacherQuery;
use App\Models\Traits\Relations\TeacherRelations;
use App\Models\Traits\Storage\TeacherStorage;
use App\Models\Traits\Assignments\TeacherAssignment;
use App\Models\Traits\Operations\TeacherOperations;
use App\Models\Traits\Mutators\TeacherMutators;

class Teacher extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        TeacherQuery,
        TeacherRelations,
        TeacherStorage,
        TeacherAssignment,
        TeacherOperations,
        TeacherMutators;
        
    protected $fillable = [
        'user_id'
    ];

    protected $creatable = [
        'user_id'
    ];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
