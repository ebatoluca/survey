<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Http\Resources\Models\SurveyResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Survey\PoliciesRequest;
use App\Http\Requests\Survey\PolicyRequest;
use App\Http\Requests\Survey\IndexRequest;
use App\Http\Requests\Survey\ShowRequest;
use App\Http\Requests\Survey\CreateRequest;
use App\Http\Requests\Survey\UpdateRequest;
use App\Http\Requests\Survey\DeleteRequest;
use App\Http\Requests\Survey\RestoreRequest;
use App\Http\Requests\Survey\ForceDeleteRequest;
use App\Http\Requests\Survey\ExportRequest;
use App\Http\Events\Survey\Events\CreateEvent;
use App\Http\Events\Survey\Events\DeleteEvent;
use App\Http\Events\Survey\Events\ExportEvent;
use App\Http\Events\Survey\Events\ForceDeleteEvent;
use App\Http\Events\Survey\Events\RestoreEvent;
use App\Http\Events\Survey\Events\UpdateEvent;

class SurveyController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $survey = ($request->id) ? 
            Survey::findOrFail($request->id) : 
            app(Survey::class);

        return response()->json([
            'index'          => user()->can('index', $survey),
            'view'           => user()->can('view', $survey),
            'viewAny'        => user()->can('viewAny', $survey),
            'create'         => user()->can('create', $survey),
            'update'         => user()->can('update', $survey),
            'delete'         => user()->can('delete', $survey),
            'restore'        => user()->can('restore', $survey),
            'forceDelete'    => user()->can('forceDelete', $survey),
            'export'         => user()->can('export', $survey),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $survey = ($request->id) ? 
            Survey::findOrFail($request->id) : 
            app(Survey::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $survey),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Survey', $request);

        $query = $builder->get();

        return SurveyResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $survey = Survey::where('id', $request->survey_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new SurveyResource($survey);

    }

    public function create(CreateRequest $request)
    {

        $survey = (new Survey)->createModel($request);

        $response = new SurveyResource($survey);

        event(new CreateEvent($survey, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $survey = Survey::findOrFail($request->survey_id);

        $survey = $survey->updateModel($request);

        $response = new SurveyResource($survey);

        event(new UpdateEvent($survey, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $survey = Survey::findOrFail($request->survey_id);

        $survey->deleteModel();

        $response = new SurveyResource($survey);

        event(new DeleteEvent($survey, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $survey = Survey::withTrashed()->findOrFail($request->survey_id);

        $survey->restoreModel();

        $response = new SurveyResource($survey);

        event(new RestoreEvent($survey, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $survey = Survey::withTrashed()->findOrFail($request->survey_id);

        $survey->forceDeleteModel();

        $response = new SurveyResource($survey);

        event(new ForceDeleteEvent($survey, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
