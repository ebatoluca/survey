<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestionMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'survey_question_id'
    ];

    public function surveyQuestion() 
    {
        return $this->belongsTo('App\Models\SurveyQuestion');
    }
}
