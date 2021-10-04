@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.vetProffesion.title_singular') }}:
                    {{ trans('cruds.vetProffesion.fields.id') }}
                    {{ $vetProffesion->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('vet-proffesion.edit', [$vetProffesion])
        </div>
    </div>
</div>
@endsection