<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Models\UserResource;
use App\Classes\Search\SearchBuilder;
use App\Http\Requests\User\PoliciesRequest;
use App\Http\Requests\User\PolicyRequest;
use App\Http\Requests\User\IndexRequest;
use App\Http\Requests\User\ShowRequest;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\RestoreRequest;
use App\Http\Requests\User\ForceDeleteRequest;
use App\Http\Requests\User\ExportRequest;
use App\Http\Events\User\Events\CreateEvent;
use App\Http\Events\User\Events\DeleteEvent;
use App\Http\Events\User\Events\ExportEvent;
use App\Http\Events\User\Events\ForceDeleteEvent;
use App\Http\Events\User\Events\RestoreEvent;
use App\Http\Events\User\Events\UpdateEvent;

class UserController extends Controller
{
    
    public function __construct()
    {
        
        $this->middleware('auth:sanctum');

    }

    public function policies(PoliciesRequest $request)
    {

        $user = ($request->id) ? 
            User::findOrFail($request->id) : 
            app(User::class);

        return response()->json([
            'index'          => user()->can('index', $user),
            'view'           => user()->can('view', $user),
            'viewAny'        => user()->can('viewAny', $user),
            'create'         => user()->can('create', $user),
            'update'         => user()->can('update', $user),
            'delete'         => user()->can('delete', $user),
            'restore'        => user()->can('restore', $user),
            'forceDelete'    => user()->can('forceDelete', $user),
            'export'         => user()->can('export', $user),
        ]);

    }

    public function policy(PolicyRequest $request)
    {

        $user = ($request->id) ? 
            User::findOrFail($request->id) : 
            app(User::class);

        return response()->json([
            $request->policy => user()->can($request->policy, $user),
        ]);

    }

    public function index(IndexRequest $request)
    {

        $builder = new SearchBuilder('User', $request);

        $query = $builder->get();

        return UserResource::collection($query);

    }

    public function show(ShowRequest $request)
    {

        $user = User::where('id', $request->user_id)
            ->with($request->load_relations ?? [])
            ->firstOrFail();

        return new UserResource($user);

    }

    public function create(CreateRequest $request)
    {

        $user = (new User)->createModel($request);

        $response = new UserResource($user);

        event(new CreateEvent($user, $request, $response));

        return $response;

    }

    public function update(UpdateRequest $request)
    {

        $user = User::findOrFail($request->user_id);

        $user = $user->updateModel($request);

        $response = new UserResource($user);

        event(new UpdateEvent($user, $request, $response));

        return $response;

    }

    public function delete(DeleteRequest $request)
    {

        $user = User::findOrFail($request->user_id);

        $user->deleteModel();

        $response = new UserResource($user);

        event(new DeleteEvent($user, $request, $response));

        return $response;

    }

    public function restore(RestoreRequest $request)
    {

        $user = User::withTrashed()->findOrFail($request->user_id);

        $user->restoreModel();

        $response = new UserResource($user);

        event(new RestoreEvent($user, $request, $response));

        return $response;

    }

    public function forceDelete(ForceDeleteRequest $request)
    {

        $user = User::withTrashed()->findOrFail($request->user_id);

        $user->forceDeleteModel();

        $response = new UserResource($user);

        event(new ForceDeleteEvent($user, $request, $response));

        return $response;

    }

    public function export(ExportRequest $request)
    {

        event(new ExportEvent($request));

        return response()->json(['status' => true]);

    }

}
