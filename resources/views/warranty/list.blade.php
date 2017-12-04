@extends('layouts.master')

@section('title')
View Warranties
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                View Warranties
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Details</th>
                    <th>Id</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Created On</th>
                    <th>Updated On</th>
                </tr>
                @foreach ($warranties as $rec)
                <tr>
                    <td><a href="{{ URL::to('warranty/'. $rec->id) }}" target="_blank">View</a></td>
                    <td>{{ $rec->id }}</td>
                    <td>{{ $rec->description }}</td>
                    <td>{{ $rec->start_date }}</td>
                    <td>{{ $rec->end_date }}</td>
                    <td>{{ $rec->created_at }}</td>
                    <td>{{ $rec->updated_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</section>
@endsection
