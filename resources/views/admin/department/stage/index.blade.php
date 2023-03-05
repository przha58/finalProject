@extends('layouts.admin')

@section('content')
<div class="container card">
   <div>
       <a href="{{ route('admin.stage.create', ['dep_id' => request('dep_id')]) }}" class="btn btn-success m-2">Add</a>
       <a class="btn btn-primary" href="{{ route('admin.department.index') }}">Back</a>
        <table class="table table-striped" style="vertical-align: middle">
            <thead>
                <tr>
                    <th>Stagename</th>
                    <th>StageNumber</th>
                    <th>Module</th>
                    <th>Department</th>
                    <th>Create Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{$row->Stagename}}</td>
                        <td>{{$row->StageNumber}}</td>
                        <td><a href="{{ route('admin.lecture.index', ['stage_id' => $row->id, 'dep_id' => request('dep_id')]) }}">Add Module</a></td>
                        <td>{{$row->department->name}}</td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('admin.stage.edit', ['stage' => $row->id, 'dep_id' => request('dep_id')]) }}"><i class="bi bi-pen"></i></a>
                                <form id="{{ $row->id }}" action="{{ route('admin.stage.destroy', ['stage' => $row->id]) }}" method="POST">
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
