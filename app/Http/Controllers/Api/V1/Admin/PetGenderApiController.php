<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetGenderRequest;
use App\Http\Requests\UpdatePetGenderRequest;
use App\Http\Resources\Admin\PetGenderResource;
use App\Models\PetGender;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetGenderApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_gender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetGenderResource(PetGender::all());
    }

    public function store(StorePetGenderRequest $request)
    {
        $petGender = PetGender::create($request->validated());

        return (new PetGenderResource($petGender))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PetGender $petGender)
    {
        abort_if(Gate::denies('pet_gender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PetGenderResource($petGender);
    }

    public function update(UpdatePetGenderRequest $request, PetGender $petGender)
    {
        $petGender->update($request->validated());

        return (new PetGenderResource($petGender))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PetGender $petGender)
    {
        abort_if(Gate::denies('pet_gender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $petGender->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
