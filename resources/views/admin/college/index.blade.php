@extends('layouts.admin')

@section('content')
<div class="container card">
   <div>
        <table class="table table-striped" style="vertical-align: middle">
            <thead>
                <tr>
                    <th>College / Institue</th>
                    <th>Type</th>
                    <th>DeanName</th>
                    <th>DeanEmail</th>
                    <th>Address</th>
                    <th>gps_lon</th>
                    <th>gps_lat</th>
                    <th>Create Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->type == 1?'College':'Institue'}}</td>
                        <td>{{$row->DeanName}}</td>
                        <td>{{$row->DeanEmail}}</td>
                        <td>{{$row->address}}</td>
                        <td>{{$row->gps_lon}}</td>
                        <td>{{$row->gps_lat}}</td>
                        <td>{{$row->created_at->format('Y-m-d')}}</td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-primary" href="{{ route('admin.college.edit', ['college' => $row->id]) }}"><i class="bi bi-pen"></i></a>
                                <form id="{{ $row->id }}" action="{{ route('admin.college.destroy', ['college' => $row->id]) }}" method="POST">
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
