<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use App\Http\Resources\Admin\PetResource;
use App\Models\Pet;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetResource(Pet::with(['petType', 'petGender'])->get());
    }

    public function store(StorePetRequest $request)
    {
        $pet = Pet::create($request->validated());

        if ($request->input('avatar', false)) {
            $pet->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
        }

        return (new PetResource($pet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pet $pet)
    {
        abort_if(Gate::denies('pet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetResource($pet->load(['petType', 'petGender']));
    }

    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $pet->update($request->validated());

        if ($request->input('avatar', false)) {
            if (!$pet->avatar || $request->input('avatar') !== $pet->avatar->file_name) {
                if ($pet->avatar) {
                    $pet->avatar->delete();
                }
                $pet->addMedia(storage_path('tmp/uploads/' . basename($request->input('avatar'))))->toMediaCollection('avatar');
            }
        } elseif ($pet->avatar) {
            $pet->avatar->delete();
        }

        return (new PetResource($pet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pet $pet)
    {
        abort_if(Gate::denies('pet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
