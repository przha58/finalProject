@extends('layouts.admin')

@section('content')
<div class="container card">
   <div>
       {{ $data }}
       <a href="{{ route('admin.lecture.create', ['dep_id' => request('dep_id'), 'stage_id' => request('stage_id'), 'staff_id' => request('staff_id')]) }}" class="btn btn-success m-2">Add</a>
       <a class="btn btn-primary" href="{{ route('admin.stage.index', ['stage_id' => request('stage_id'), 'dep_id' => request('dep_id')]) }}">Back</a>
        <table class="table table-striped" style="vertical-align: middle">
            <thead>
                <tr>
                    <th>Module Name</th>
                    <th>Stage</th>
                    <th>academicYear</th>
                    <th>ECTC</th>
                    <th>staff</th>
                    <th>Description</th>
                    <th>Create Time </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->stage->Stagename}}</td>
                        <td>{{$row->academicYear}}</td>
                        <td>{{$row->ECTS}}</td>
                        <td>@if($row->staff)<span>{{$row->staff->fullName}}</span> @endif</td>
                        <td>{{$row->info}}</td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('admin.lecture.edit', ['lecture'=> $row->id, 'stage_id' => request('stage_id'), 'dep_id' => request('dep_id'), 'staff_id' => request('staff_id')]) }}"><i class="bi bi-pen"></i></a>
                                <form id="{{ $row->id }}" action="{{ route('admin.lecture.destroy', ['lecture' => $row->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteFunction({{ $row->id }})" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $data->links('pagination::bootstrap-5') !!}
   </div>
</div>
@endsection
