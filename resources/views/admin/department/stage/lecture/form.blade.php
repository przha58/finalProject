@extends('layouts.admin')

@section('content')
<a class="btn btn-primary" href="{{ route('admin.lecture.index', ['dep_id' => request('dep_id'), 'stage_id' => request('stage_id')]) }}">Back</a>
<div class="container card">
    <form enctype="multipart/form-data" action="{{ isset($data)? route('admin.lecture.update', ['lecture' => $data->id]) : route('admin.lecture.store') }}" method="POST">
        @csrf
        @if (isset($data))
            @method('PUT')
        @endif
        <div class="row p-2">
            <div class="col-4">
                <p>Module Name</p> 
                <input value="{{ isset($data)? $data->name : old('name') }}" class="form-control" type="text" name="name" id="">
            </div>
           
            <div class="col-4">
                <p>academicYear</p>
                <input value="{{ isset($data)? $data->academicYear : old('academicYear') }}" class="form-control" type="number" name="academicYear" id="">
            </div>

            <div class="col-4"> 
                <p>ECTS</p>
                <input value="{{ isset($data)? $data->ECTS : old('ECTS') }}" class="form-control" type="number" name="ECTS" id="">
            </div>
            

                    
            <div class="col-4">
                <br>
                <p>staff</p>
                <select name="staff_id" class="form-control" id="">
                    <option value=""></option>
                    @foreach ($staff as $row)
                        <option {{ isset($data)? ($data->staff_id == $row->id? 'selected' :'') : old('type') }} value="{{ $row->id }}">{{$row->fullName}}</option>
                    @endforeach 
                </select>
            
</div>

            <div class="col-10 mt-4">
                <p> Description </p>
                <textarea class="form-control"  name="info" id="">{{ isset($data)? $data->info : old('info') }}</textarea>
            </div>
            <input type="hidden" name="stage_id" value="{{ request('stage_id') }}">
            <!-- <input type="hidden" name="staff_id" value="{{ request('staff_id') }}"> -->

        </div>
        <button class="btn btn-success m-3">
            {{ isset($data)? 'Update' :'Add' }}
        </button>
    </form>
</div>
@endsection
