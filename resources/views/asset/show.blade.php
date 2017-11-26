@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">

            @if (count($result)===1)
            <?php
            
            ?>
                <div >
                    <h2 >
                        View Asset
                    </h2>
                    <a class="btn btn-warning" href="{{ URL::to('asset/'. $result->id.'/edit') }}" target="_blank">Edit</a>
                    <a class="btn btn-danger" href="{{ URL::to('asset/'. $result->id.'/edit') }}" target="_blank">Delete</a>
                    @if (count($result->assetrepairs)>=1)
                        <h5> This asset has <a href="{{ URL::to('assetrepairs/'. $result->id) }}" target="_blank">{{ count($result->assetrepairs) }}</a> repairs</h5>
                    @endif
                    <h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                        @foreach($result->toArray() as $key => $value)
                            @if (gettype($value)!='array')
                                <h2>{{ $key }} : {{ $value }}</h2>
                            @endif
                        @endforeach
                </div>
            @endif
            @if (count($result)>1)
                <div class="title col-12 col-lg-12">
                    <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                        View Assets
                    </h2>
                        <h6 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-12">
                            <div class="table-responsive">
                            <table class="table">
                                @foreach ($result as $rec)
                                    <tr>
                                        @foreach($rec->toArray() as $key => $value)
                                            <th>{{ $key }}</th>
                                            @endforeach
                                        </tr>
                                        @break
                                @endforeach
                                @foreach ($result as $rec)
                                    <tr>
                                        @foreach($rec->toArray() as $key => $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
