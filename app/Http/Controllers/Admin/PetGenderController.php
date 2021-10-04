<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetGender;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetGenderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pet_gender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pet-gender.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pet_gender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pet-gender.create');
    }

    public function edit(PetGender $petGender)
    {
        abort_if(Gate::denies('pet_gender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pet-gender.edit', compact('petGender'));
    }

    public function show(PetGender $petGender)
    {
        abort_if(Gate::denies('pet_gender_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pet-gender.show', compact('petGender'));
    }
}
