<?php

namespace App\Http\Controllers;

use App\Models\SurveyAnswer;
use App\Http\Resources\Models\SurveyAnswerResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\SurveyAnswer\PoliciesRequest;
use App\Http\Requests\SurveyAnswer\PolicyRequest;
use App\Http\Requests\SurveyAnswer\IndexRequest;
use App\Http\Requests\SurveyAnswer\ShowRequest;
use App\Http\Requests\SurveyAnswer\CreateRequest;
use App\Http\Requests\SurveyAnswer\UpdateRequest;
use App\Http\Requests\SurveyAnswer\DeleteRequest;
use App\Http\Requests\SurveyAnswer\RestoreRequest;
use App\Http\Requests\SurveyAnswer\ForceDeleteRequest;
use App\Http\Requests\SurveyAnswer\ExportRequest;
use App\Http\Events\SurveyAnswer\Events\CreateEvent;
use App\Http\Events\SurveyAnswer\Events\DeleteEvent;
use App\Http\Events\SurveyAnswer\Events\ExportEvent;
use App\Http\Events\SurveyAnswer\Events\ForceDeleteEvent;
use App\Http\Events\SurveyAnswer\Events\RestoreEvent;
use App\Http\Events\SurveyAnswer\Events\UpdateEvent;

class SurveyAnswerController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $surveyAnswer = ($request->id) ? 
            SurveyAnswer::findOrFail($request->id) : 
            app(SurveyAnswer::class);

        return response()->json([
            'index'          => user()->can('index', $surveyAnswer),
            'view'           => user()->can('view', $surveyAnswer),
            'viewAny'        => user()->can('viewAny', $surveyAnswer),
            'create'         => user()->can('create', $surveyAnswer),
            'update'         => user()->can('update', $surveyAnswer),
            'delete'         => user()->can('delete', $surveyAnswer),
            'restore'        => user()->can('restore', $surveyAnswer),
            'forceDelete'    => user()->can('forceDelete', $surveyAnswer),
            'export'         => user()->can('export', $surveyAnswer),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $surveyAnswer = ($request->id) ? 
            SurveyAnswer::findOrFail($request->id) : 
            app(SurveyAnswer::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $surveyAnswer),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('SurveyAnswer', $request);

        $query = $builder->get();

        return SurveyAnswerResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $surveyAnswer = SurveyAnswer::where('id', $request->survey_answer_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new SurveyAnswerResource($surveyAnswer);

    }

    public function create(CreateRequest $request)
    {

        $surveyAnswer = (new SurveyAnswer)->createModel($request);

        $response = new SurveyAnswerResource($surveyAnswer);

        event(new CreateEvent($surveyAnswer, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $surveyAnswer = SurveyAnswer::findOrFail($request->survey_answer_id);

        $surveyAnswer = $surveyAnswer->updateModel($request);

        $response = new SurveyAnswerResource($surveyAnswer);

        event(new UpdateEvent($surveyAnswer, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $surveyAnswer = SurveyAnswer::findOrFail($request->survey_answer_id);

        $surveyAnswer->deleteModel();

        $response = new SurveyAnswerResource($surveyAnswer);

        event(new DeleteEvent($surveyAnswer, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $surveyAnswer = SurveyAnswer::withTrashed()->findOrFail($request->survey_answer_id);

        $surveyAnswer->restoreModel();

        $response = new SurveyAnswerResource($surveyAnswer);

        event(new RestoreEvent($surveyAnswer, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $surveyAnswer = SurveyAnswer::withTrashed()->findOrFail($request->survey_answer_id);

        $surveyAnswer->forceDeleteModel();

        $response = new SurveyAnswerResource($surveyAnswer);

        event(new ForceDeleteEvent($surveyAnswer, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
