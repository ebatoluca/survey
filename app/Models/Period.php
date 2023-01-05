<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\MetaOperations;
use App\Models\Traits\Queries\PeriodQuery;
use App\Models\Traits\Relations\PeriodRelations;
use App\Models\Traits\Storage\PeriodStorage;
use App\Models\Traits\Assignments\PeriodAssignment;
use App\Models\Traits\Operations\PeriodOperations;
use App\Models\Traits\Mutators\PeriodMutators;

class Period extends Model
{

    use HasFactory,
        SoftDeletes,
        MetaOperations,
        PeriodQuery,
        PeriodRelations,
        PeriodStorage,
        PeriodAssignment,
        PeriodOperations,
        PeriodMutators;
        
    protected $fillable = [
        'name',
    ];

    protected $creatable = [
        'name',
    ];

    protected $updatable = [
        'name',
    ];

    protected $casts = [];

    protected $protected_metas = [];

    protected $editable_metas = [];

    public $loadable_relations = [];

}
