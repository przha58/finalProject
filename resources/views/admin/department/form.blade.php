
@extends('layouts.admin')

@section('content')
<div class="container card">
    <form enctype="multipart/form-data" action="{{ isset($data)? route('admin.department.update', ['department' => $data->id]) : route('admin.department.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('PUT')
        @endif
        <div class="row p-2">
            <div class="col-4">
                <p>Department Name</p>
                <input value="{{ isset($data)? $data->name : old('name') }}" class="form-control" type="text" name="name" id="">
            </div>
            <div class="col-4">
                <p>HeadName</p>
                <input value="{{ isset($data)? $data->HeadName : old('HeadName') }}" class="form-control" type="text" name="HeadName" id="">
            </div>
            <div class="col-4">
                <p>HeadEmail</p>
                <input value="{{ isset($data)? $data->HeadEmail : old('HeadEmail') }}" class="form-control" type="email" name="HeadEmail" id="">
            </div>
            <div class="col-4">
                <p>College/Institue</p>
                <select name="college_id" class="form-control" id="">
                    <option value=""></option>
                    @foreach ($college as $row)
                        <option {{ isset($data)? ($data->college_id == $row->id? 'selected' :'') : old('type') }} value="{{ $row->id }}">{{$row->name}}</option>
                    @endforeach 
                </select>
            </div>

        </div>
        <button class="btn btn-success m-3">
            {{ isset($data)? 'Update' :'Add' }}
        </button>
    </form>
</div>
@endsection
