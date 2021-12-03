<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subsription;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubsriptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subsription_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subsription.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subsription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subsription.create');
    }

    public function edit(Subsription $subsription)
    {
        abort_if(Gate::denies('subsription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subsription.edit', compact('subsription'));
    }

    public function show(Subsription $subsription)
    {
        abort_if(Gate::denies('subsription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subsription->load('subscriptionUser');

        return view('admin.subsription.show', compact('subsription'));
    }
}
