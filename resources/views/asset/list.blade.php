@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                View Assets
            </h2>
        </div>
        <div class="table-responsive">
            <table class="table">
                @foreach ($assets as $rec)
                <tr>
                    <th>Details</th>
                    @foreach($rec->toArray() as $key => $value)
                    <th>{{ $key }}</th>
                    @endforeach
                </tr>
                @break
                @endforeach

                @foreach ($assets as $rec)
                <tr>
                    <td><a href="{{ URL::to('asset/'. $rec->id) }}" target="_blank">View</a></td>
                    @foreach($rec->toArray() as $key => $value)
                    @if ($key === 'group_id')
                    <td><a href="{{ URL::to('groups/'. $value) }}" target="_blank">{{ $value }}</a></td>
                    @elseif ($key === 'location_id')
                    <td><a href="{{ URL::to('locations/'. $value) }}" target="_blank">{{ $value }}</a></td>
                    @else
                    <td>{{ $value }}</td>
                    @endif
                    @endforeach
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</section>
@endsection
