@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.subsription.title_singular') }}:
                    {{ trans('cruds.subsription.fields.id') }}
                    {{ $subsription->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('subsription.edit', [$subsription])
        </div>
    </div>
</div>
@endsection