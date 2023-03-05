@extends('layouts.admin')

@section('content')
<div class="container card" dir="ltr">
    <form action="{{ isset($data)? route('admin.staff.update', ['staff' => $data->id]) : route('admin.staff.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('PUT')
        @endif
        <div class="row p-2">
        <div class="col-4">
                <p>FullName</p>
                <input  value="{{ isset($data)? $data->fullName : old('fullName') }}" class="form-control" type="text" name="fullName" id="">
            </div>
            <div class="col-4">
                <p>Email</p>
                <input value="{{ isset($data)? $data->email : old('email') }}" class="form-control" type="email" name="email" id="">
            </div>
            <div class="col-4">
                <p>ScientificTitle</p>
                <input value="{{ isset($data)? $data->scientificTitle : old('scientificTitle') }}" class="form-control" type="text" name="scientificTitle" id="">
            </div>
            <div class="col-4">
                <p>Certificate</p>
                <input value="{{ isset($data)? $data->certificate : old('certificate') }}" class="form-control" type="text" name="certificate" id="">
            </div>

                
            <div class="col-4">
                <p>departments</p>
                <select name="dep_id" class="form-control" id="">
                    <option value=""></option>
                    @foreach ($department as $row)
                        <option {{ isset($data)? ($data->dep_id == $row->id? 'selected' :'') : old('type') }} value="{{ $row->id }}">{{$row->name}}</option>
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
