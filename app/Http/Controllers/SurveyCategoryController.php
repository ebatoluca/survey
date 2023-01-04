<?php

namespace App\Http\Controllers;

use App\Models\SurveyCategory;
use App\Http\Resources\Models\SurveyCategoryResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\SurveyCategory\PoliciesRequest;
use App\Http\Requests\SurveyCategory\PolicyRequest;
use App\Http\Requests\SurveyCategory\IndexRequest;
use App\Http\Requests\SurveyCategory\ShowRequest;
use App\Http\Requests\SurveyCategory\CreateRequest;
use App\Http\Requests\SurveyCategory\UpdateRequest;
use App\Http\Requests\SurveyCategory\DeleteRequest;
use App\Http\Requests\SurveyCategory\RestoreRequest;
use App\Http\Requests\SurveyCategory\ForceDeleteRequest;
use App\Http\Requests\SurveyCategory\ExportRequest;
use App\Http\Events\SurveyCategory\Events\CreateEvent;
use App\Http\Events\SurveyCategory\Events\DeleteEvent;
use App\Http\Events\SurveyCategory\Events\ExportEvent;
use App\Http\Events\SurveyCategory\Events\ForceDeleteEvent;
use App\Http\Events\SurveyCategory\Events\RestoreEvent;
use App\Http\Events\SurveyCategory\Events\UpdateEvent;

class SurveyCategoryController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $surveyCategory = ($request->id) ? 
            SurveyCategory::findOrFail($request->id) : 
            app(SurveyCategory::class);

        return response()->json([
            'index'          => user()->can('index', $surveyCategory),
            'view'           => user()->can('view', $surveyCategory),
            'viewAny'        => user()->can('viewAny', $surveyCategory),
            'create'         => user()->can('create', $surveyCategory),
            'update'         => user()->can('update', $surveyCategory),
            'delete'         => user()->can('delete', $surveyCategory),
            'restore'        => user()->can('restore', $surveyCategory),
            'forceDelete'    => user()->can('forceDelete', $surveyCategory),
            'export'         => user()->can('export', $surveyCategory),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $surveyCategory = ($request->id) ? 
            SurveyCategory::findOrFail($request->id) : 
            app(SurveyCategory::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $surveyCategory),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('SurveyCategory', $request);

        $query = $builder->get();

        return SurveyCategoryResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $surveyCategory = SurveyCategory::where('id', $request->survey_category_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new SurveyCategoryResource($surveyCategory);

    }

    public function create(CreateRequest $request)
    {

        $surveyCategory = (new SurveyCategory)->createModel($request);

        $response = new SurveyCategoryResource($surveyCategory);

        event(new CreateEvent($surveyCategory, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $surveyCategory = SurveyCategory::findOrFail($request->survey_category_id);

        $surveyCategory = $surveyCategory->updateModel($request);

        $response = new SurveyCategoryResource($surveyCategory);

        event(new UpdateEvent($surveyCategory, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $surveyCategory = SurveyCategory::findOrFail($request->survey_category_id);

        $surveyCategory->deleteModel();

        $response = new SurveyCategoryResource($surveyCategory);

        event(new DeleteEvent($surveyCategory, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $surveyCategory = SurveyCategory::withTrashed()->findOrFail($request->survey_category_id);

        $surveyCategory->restoreModel();

        $response = new SurveyCategoryResource($surveyCategory);

        event(new RestoreEvent($surveyCategory, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $surveyCategory = SurveyCategory::withTrashed()->findOrFail($request->survey_category_id);

        $surveyCategory->forceDeleteModel();

        $response = new SurveyCategoryResource($surveyCategory);

        event(new ForceDeleteEvent($surveyCategory, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
