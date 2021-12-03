<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use Gate;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserApiController extends Controller
{
    use MediaUploadTrait;
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource(User::with(['roles', 'vetProffesion', 'currentLocation'])->get());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));
//        if ($request->input('avatar', false)) {
//            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
//        }
//
//        if ($request->input('certifications', false)) {
//            $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('certifications'))))->toMediaCollection('certifications');
//        }

        if($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('user_avatar');
        }
        else{
            return \response('image error')->setStatusCode(401,);
        }

        if($request->hasFile('certification') && $request->file('certification')->isValid()) {
            $pet->addMediaFromRequest('certification')->toMediaCollection('user_certifications');
        }
        else{
            return \response('image error')->setStatusCode(401,);
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }



    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserResource($user->load(['roles', 'vetProffesion', 'currentLocation']));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        if ($request->input('avatar', false)) {
            if (!$user->avatar || $request->input('avatar') !== $user->avatar->file_name) {
                if ($user->avatar) {
                    $user->avatar->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
            }
        } elseif ($user->avatar) {
            $user->avatar->delete();
        }

        if ($request->input('certifications', false)) {
            if (!$user->certifications || $request->input('certifications') !== $user->certifications->file_name) {
                if ($user->certifications) {
                    $user->certifications->delete();
                }
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('certifications'))))->toMediaCollection('certifications');
            }
        } elseif ($user->certifications) {
            $user->certifications->delete();
        }

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getVets()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vets = User::query()

            ->with(['roles', 'vetProffesion', 'currentLocation'])
            ->whereHas('roles', function ($query){
                $query->where('role_id',3);
            })
            ->get();

        return new UserResource($vets);
    }

    public function myInfo()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $me = User::query()

            ->with(['vetProffesion', 'currentLocation'])
            ->where('id',auth()->id())
            ->get();

        return new UserResource($me);
    }
}




