<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\StudentQuery;
use App\Models\Traits\Relations\StudentRelations;
use App\Models\Traits\Storage\StudentStorage;
use App\Models\Traits\Assignments\StudentAssignment;
use App\Models\Traits\Operations\StudentOperations;
use App\Models\Traits\Mutators\StudentMutators;

class Student extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        StudentQuery,
        StudentRelations,
        StudentStorage,
        StudentAssignment,
        StudentOperations,
        StudentMutators;
        
    protected $fillable = [];

    protected $creatable = [];

    protected $updatable = [];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
