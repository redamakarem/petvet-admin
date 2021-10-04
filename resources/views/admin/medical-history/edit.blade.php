@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.medicalHistory.title_singular') }}:
                    {{ trans('cruds.medicalHistory.fields.id') }}
                    {{ $medicalHistory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('medical-history.edit', [$medicalHistory])
        </div>
    </div>
</div>
@endsection