<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicalHistoryRequest;
use App\Http\Requests\UpdateMedicalHistoryRequest;
use App\Http\Resources\Admin\MedicalHistoryResource;
use App\Models\MedicalHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalHistoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('medical_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MedicalHistoryResource(MedicalHistory::with(['recordPet', 'recordUser'])->get());
    }

    public function store(StoreMedicalHistoryRequest $request)
    {
        $medicalHistory = MedicalHistory::create($request->validated());

        return (new MedicalHistoryResource($medicalHistory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MedicalHistory $medicalHistory)
    {
        abort_if(Gate::denies('medical_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MedicalHistoryResource($medicalHistory->load(['recordPet', 'recordUser']));
    }

    public function update(UpdateMedicalHistoryRequest $request, MedicalHistory $medicalHistory)
    {
        $medicalHistory->update($request->validated());

        return (new MedicalHistoryResource($medicalHistory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MedicalHistory $medicalHistory)
    {
        abort_if(Gate::denies('medical_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicalHistory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
