<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalHistory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('medical_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medical-history.index');
    }

    public function create()
    {
        abort_if(Gate::denies('medical_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medical-history.create');
    }

    public function edit(MedicalHistory $medicalHistory)
    {
        abort_if(Gate::denies('medical_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.medical-history.edit', compact('medicalHistory'));
    }

    public function show(MedicalHistory $medicalHistory)
    {
        abort_if(Gate::denies('medical_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $medicalHistory->load('recordPet', 'recordUser');

        return view('admin.medical-history.show', compact('medicalHistory'));
    }
}
