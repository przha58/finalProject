@extends('layouts.admin')

@section('content')
<div class="container card">
   <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>ScientificTitle</th>
                    <th>Certificate</th>
                    <th>department</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                    <td>{{$row->fullName}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->scientificTitle}}</td>
                        <td>{{$row->certificate}}</td>
                        <td>{{$row->department->name}}</td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('admin.staff.edit', ['staff' => $row->id]) }}"><i class="bi bi-pen"></i></a>
                                <form id="{{ $row->id }}" action="{{ route('admin.staff.destroy', ['staff' => $row->id]) }}" method="POST">
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
