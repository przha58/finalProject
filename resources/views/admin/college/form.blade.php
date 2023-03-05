@extends('layouts.admin')

@section('content')
<div class="container card">
    <form enctype="multipart/form-data" action="{{ isset($data)? route('admin.college.update', ['college' => $data->id]) : route('admin.college.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('PUT')
        @endif
        <div class="row p-2">
            <div class="col-4">
                <p>College/Institue Name</p>
                <input value="{{ isset($data)? $data->name : old('name') }}" class="form-control" type="text" name="name" id="">
            </div>
            <div class="col-4">
                <p>Type</p>
                <select name="type" class="form-control" id="">
                    <option value=""></option>
                    <option {{ isset($data)? ($data->type == 0? 'selected' :'') : old('type') }} value="0">Institue</option>
                    <option {{ isset($data)? ($data->type == 1? 'selected' :'') : old('type') }} value="1">College</option>
                </select>
            </div>
            <div class="col-4">
                <p>DeanName</p>
                <input value="{{ isset($data)? $data->DeanName : old('DeanName') }}" class="form-control" type="text" name="DeanName" id="">
            </div>
            <div class="col-4">
                <p>DeanEmail</p>
                <input value="{{ isset($data)? $data->DeanEmail : old('DeanEmail') }}" class="form-control" type="email" name="DeanEmail" id="">
            </div>
            <div class="col-4">
                <p>Address</p>
                <input value="{{ isset($data)? $data->address : old('address') }}" class="form-control" type="text" name="address" id="">
            </div>
            <div class="col-4">
                <p>gps_lon</p>
                <input value="{{ isset($data)? $data->gps_lon : old('gps_lon') }}" class="form-control" type="text" name="gps_lon" id="">
            </div>
            <div class="col-4">
                <p>gps_lat</p>
                <input value="{{ isset($data)? $data->gps_lat : old('gps_lat') }}" class="form-control" type="text" name="gps_lat" id="">
            </div>
        </div>
        <button class="btn btn-success m-3">
            {{ isset($data)? 'Update' :'Add' }}
        </button>
    </form>
</div>
@endsection
