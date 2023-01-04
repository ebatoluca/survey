<?php

namespace App\Models\Traits\Assignments;

/* Replace the word "Model" and "model" */

trait SurveyAssignment
{

	public function assignModel($request)
	{

        $operationResult = $this->model()->syncWithoutDetaching([
            $request->model_id => [
            	// Pivot values
            ]
        ]);

        return response()->json([
        	'model_id' => $request->model_id,
        	'survey_id' => $request->survey_id,
        	'operation' => $operationResult
        ]);

	}

	public function deallocateModel($request)
	{

		$operationResult = $this->model()->detach($request->model_id);

		return response()->json([
        	'model_id' => $request->model_id,
        	'survey_id' => $request->survey_id,
        	'operation' => $operationResult
        ]);

	}

}