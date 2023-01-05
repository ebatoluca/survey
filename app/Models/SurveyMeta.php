<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'survey_id'
    ];

    public function survey() 
    {
        return $this->belongsTo('App\Models\Survey');
    }

}
