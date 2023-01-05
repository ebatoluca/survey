<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\CourseCategoryQuery;
use App\Models\Traits\Relations\CourseCategoryRelations;
use App\Models\Traits\Storage\CourseCategoryStorage;
use App\Models\Traits\Assignments\CourseCategoryAssignment;
use App\Models\Traits\Operations\CourseCategoryOperations;
use App\Models\Traits\Mutators\CourseCategoryMutators;

class CourseCategory extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        CourseCategoryQuery,
        CourseCategoryRelations,
        CourseCategoryStorage,
        CourseCategoryAssignment,
        CourseCategoryOperations,
        CourseCategoryMutators;
        
    protected $fillable = [
        'name',
        'parent_id',
    ];

    protected $creatable = [
        'name',
        'parent_id',
    ];

    protected $updatable = [
        'name',
        'parent_id',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
