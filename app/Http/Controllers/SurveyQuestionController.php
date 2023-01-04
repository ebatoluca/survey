<?php

namespace App\Http\Controllers;

use App\Models\SurveyQuestion;
use App\Http\Resources\Models\SurveyQuestionResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\SurveyQuestion\PoliciesRequest;
use App\Http\Requests\SurveyQuestion\PolicyRequest;
use App\Http\Requests\SurveyQuestion\IndexRequest;
use App\Http\Requests\SurveyQuestion\ShowRequest;
use App\Http\Requests\SurveyQuestion\CreateRequest;
use App\Http\Requests\SurveyQuestion\UpdateRequest;
use App\Http\Requests\SurveyQuestion\DeleteRequest;
use App\Http\Requests\SurveyQuestion\RestoreRequest;
use App\Http\Requests\SurveyQuestion\ForceDeleteRequest;
use App\Http\Requests\SurveyQuestion\ExportRequest;
use App\Http\Events\SurveyQuestion\Events\CreateEvent;
use App\Http\Events\SurveyQuestion\Events\DeleteEvent;
use App\Http\Events\SurveyQuestion\Events\ExportEvent;
use App\Http\Events\SurveyQuestion\Events\ForceDeleteEvent;
use App\Http\Events\SurveyQuestion\Events\RestoreEvent;
use App\Http\Events\SurveyQuestion\Events\UpdateEvent;

class SurveyQuestionController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $surveyQuestion = ($request->id) ? 
            SurveyQuestion::findOrFail($request->id) : 
            app(SurveyQuestion::class);

        return response()->json([
            'index'          => user()->can('index', $surveyQuestion),
            'view'           => user()->can('view', $surveyQuestion),
            'viewAny'        => user()->can('viewAny', $surveyQuestion),
            'create'         => user()->can('create', $surveyQuestion),
            'update'         => user()->can('update', $surveyQuestion),
            'delete'         => user()->can('delete', $surveyQuestion),
            'restore'        => user()->can('restore', $surveyQuestion),
            'forceDelete'    => user()->can('forceDelete', $surveyQuestion),
            'export'         => user()->can('export', $surveyQuestion),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $surveyQuestion = ($request->id) ? 
            SurveyQuestion::findOrFail($request->id) : 
            app(SurveyQuestion::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $surveyQuestion),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('SurveyQuestion', $request);

        $query = $builder->get();

        return SurveyQuestionResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $surveyQuestion = SurveyQuestion::where('id', $request->survey_question_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new SurveyQuestionResource($surveyQuestion);

    }

    public function create(CreateRequest $request)
    {

        $surveyQuestion = (new SurveyQuestion)->createModel($request);

        $response = new SurveyQuestionResource($surveyQuestion);

        event(new CreateEvent($surveyQuestion, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $surveyQuestion = SurveyQuestion::findOrFail($request->survey_question_id);

        $surveyQuestion = $surveyQuestion->updateModel($request);

        $response = new SurveyQuestionResource($surveyQuestion);

        event(new UpdateEvent($surveyQuestion, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $surveyQuestion = SurveyQuestion::findOrFail($request->survey_question_id);

        $surveyQuestion->deleteModel();

        $response = new SurveyQuestionResource($surveyQuestion);

        event(new DeleteEvent($surveyQuestion, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $surveyQuestion = SurveyQuestion::withTrashed()->findOrFail($request->survey_question_id);

        $surveyQuestion->restoreModel();

        $response = new SurveyQuestionResource($surveyQuestion);

        event(new RestoreEvent($surveyQuestion, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $surveyQuestion = SurveyQuestion::withTrashed()->findOrFail($request->survey_question_id);

        $surveyQuestion->forceDeleteModel();

        $response = new SurveyQuestionResource($surveyQuestion);

        event(new ForceDeleteEvent($surveyQuestion, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
