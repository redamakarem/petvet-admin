@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.pettype.title_singular') }}:
                    {{ trans('cruds.pettype.fields.id') }}
                    {{ $pettype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('pettype.edit', [$pettype])
        </div>
    </div>
</div>
@endsection