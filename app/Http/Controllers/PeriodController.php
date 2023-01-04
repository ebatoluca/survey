<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Resources\Models\PeriodResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Period\PoliciesRequest;
use App\Http\Requests\Period\PolicyRequest;
use App\Http\Requests\Period\IndexRequest;
use App\Http\Requests\Period\ShowRequest;
use App\Http\Requests\Period\CreateRequest;
use App\Http\Requests\Period\UpdateRequest;
use App\Http\Requests\Period\DeleteRequest;
use App\Http\Requests\Period\RestoreRequest;
use App\Http\Requests\Period\ForceDeleteRequest;
use App\Http\Requests\Period\ExportRequest;
use App\Http\Events\Period\Events\CreateEvent;
use App\Http\Events\Period\Events\DeleteEvent;
use App\Http\Events\Period\Events\ExportEvent;
use App\Http\Events\Period\Events\ForceDeleteEvent;
use App\Http\Events\Period\Events\RestoreEvent;
use App\Http\Events\Period\Events\UpdateEvent;

class PeriodController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $period = ($request->id) ? 
            Period::findOrFail($request->id) : 
            app(Period::class);

        return response()->json([
            'index'          => user()->can('index', $period),
            'view'           => user()->can('view', $period),
            'viewAny'        => user()->can('viewAny', $period),
            'create'         => user()->can('create', $period),
            'update'         => user()->can('update', $period),
            'delete'         => user()->can('delete', $period),
            'restore'        => user()->can('restore', $period),
            'forceDelete'    => user()->can('forceDelete', $period),
            'export'         => user()->can('export', $period),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $period = ($request->id) ? 
            Period::findOrFail($request->id) : 
            app(Period::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $period),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Period', $request);

        $query = $builder->get();

        return PeriodResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $period = Period::where('id', $request->period_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new PeriodResource($period);

    }

    public function create(CreateRequest $request)
    {

        $period = (new Period)->createModel($request);

        $response = new PeriodResource($period);

        event(new CreateEvent($period, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $period = Period::findOrFail($request->period_id);

        $period = $period->updateModel($request);

        $response = new PeriodResource($period);

        event(new UpdateEvent($period, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $period = Period::findOrFail($request->period_id);

        $period->deleteModel();

        $response = new PeriodResource($period);

        event(new DeleteEvent($period, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $period = Period::withTrashed()->findOrFail($request->period_id);

        $period->restoreModel();

        $response = new PeriodResource($period);

        event(new RestoreEvent($period, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $period = Period::withTrashed()->findOrFail($request->period_id);

        $period->forceDeleteModel();

        $response = new PeriodResource($period);

        event(new ForceDeleteEvent($period, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
