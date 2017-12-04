@extends('layouts.master')

@section('title')
View Computers
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                View Computers
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Details</th>
                    <th>Asset Id</th>
                    <th>Computer Type Id</th>
                    <th>Memory</th>
                    <th>Model</th>
                    <th>Operating System</th>
                    <th>Mac Address</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                </tr>
                @foreach ($computers as $rec)
                <tr>
                    <td><a href="{{ URL::to('computer/'. $rec->asset_id) }}" target="_blank">View</a></td>
                    <td><a href="{{ URL::to('asset/'. $rec->asset_id) }}" target="_blank">{{ $rec->asset_id }}</a></td>
                    <td><a href="{{ URL::to('computertype/'. $rec->computer_type_id) }}" target="_blank">{{ $rec->computer_type_id }}</a></td>
                    <td>{{ $rec->memory }}</td>
                    <td>{{ $rec->model }}</td>
                    <td>{{ $rec->operating_system }}</td>
                    <td>{{ $rec->mac_address }}</td>
                    <td>{{ $rec->created_at }}</td>
                    <td>{{ $rec->updated_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</section>
@endsection
