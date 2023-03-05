@extends('layouts.admin')

@section('content')
<a class="btn btn-primary" href="{{ route('admin.stage.index', ['dep_id' => request('dep_id')]) }}">Back</a>
<div class="container card">
    <form enctype="multipart/form-data" action="{{ isset($data)? route('admin.stage.update', ['stage' => $data->id]) : route('admin.stage.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('PUT')
        @endif
        <div class="row p-2">
            <div class="col-4">
                <p>StageName</p>
                <input value="{{ isset($data)? $data->Stagename : old('Stagename') }}" class="form-control" type="text" name="Stagename" id="">
            </div>
            <div class="col-4">
                <p>StageNumber</p>
                <input value="{{ isset($data)? $data->StageNumber : old('StageNumber') }}" class="form-control" type="text" name="StageNumber" id="">
            </div>
            <input type="hidden" name="dep_id" value="{{ request('dep_id') }}">

        </div>
        <button class="btn btn-success m-3">
            {{ isset($data)? 'Update' :'Add' }}
        </button>
    </form>
</div>
@endsection
