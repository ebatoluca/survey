<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Http\Resources\Models\AttemptResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\Attempt\PoliciesRequest;
use App\Http\Requests\Attempt\PolicyRequest;
use App\Http\Requests\Attempt\IndexRequest;
use App\Http\Requests\Attempt\ShowRequest;
use App\Http\Requests\Attempt\CreateRequest;
use App\Http\Requests\Attempt\UpdateRequest;
use App\Http\Requests\Attempt\DeleteRequest;
use App\Http\Requests\Attempt\RestoreRequest;
use App\Http\Requests\Attempt\ForceDeleteRequest;
use App\Http\Requests\Attempt\ExportRequest;
use App\Http\Events\Attempt\Events\CreateEvent;
use App\Http\Events\Attempt\Events\DeleteEvent;
use App\Http\Events\Attempt\Events\ExportEvent;
use App\Http\Events\Attempt\Events\ForceDeleteEvent;
use App\Http\Events\Attempt\Events\RestoreEvent;
use App\Http\Events\Attempt\Events\UpdateEvent;

class AttemptController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $attempt = ($request->id) ? 
            Attempt::findOrFail($request->id) : 
            app(Attempt::class);

        return response()->json([
            'index'          => user()->can('index', $attempt),
            'view'           => user()->can('view', $attempt),
            'viewAny'        => user()->can('viewAny', $attempt),
            'create'         => user()->can('create', $attempt),
            'update'         => user()->can('update', $attempt),
            'delete'         => user()->can('delete', $attempt),
            'restore'        => user()->can('restore', $attempt),
            'forceDelete'    => user()->can('forceDelete', $attempt),
            'export'         => user()->can('export', $attempt),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $attempt = ($request->id) ? 
            Attempt::findOrFail($request->id) : 
            app(Attempt::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $attempt),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('Attempt', $request);

        $query = $builder->get();

        return AttemptResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $attempt = Attempt::where('id', $request->attempt_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new AttemptResource($attempt);

    }

    public function create(CreateRequest $request)
    {

        $attempt = (new Attempt)->createModel($request);

        $response = new AttemptResource($attempt);

        event(new CreateEvent($attempt, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $attempt = Attempt::findOrFail($request->attempt_id);

        $attempt = $attempt->updateModel($request);

        $response = new AttemptResource($attempt);

        event(new UpdateEvent($attempt, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $attempt = Attempt::findOrFail($request->attempt_id);

        $attempt->deleteModel();

        $response = new AttemptResource($attempt);

        event(new DeleteEvent($attempt, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $attempt = Attempt::withTrashed()->findOrFail($request->attempt_id);

        $attempt->restoreModel();

        $response = new AttemptResource($attempt);

        event(new RestoreEvent($attempt, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $attempt = Attempt::withTrashed()->findOrFail($request->attempt_id);

        $attempt->forceDeleteModel();

        $response = new AttemptResource($attempt);

        event(new ForceDeleteEvent($attempt, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
