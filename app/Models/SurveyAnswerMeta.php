<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswerMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'survey_answer_id'
    ];

    public function surveyAnswer() 
    {
        return $this->belongsTo('App\Models\SurveyAnswer');
    }
}
