@extends('layouts.master')

@section('title')
View Asset
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                View Asset {{ $asset->id }}
            </h2>
        </div>
        <a class="btn btn-warning" href="{{ URL::to('asset/'. $asset->id.'/edit') }}">Edit</a>
        <a class="btn btn-danger" href="{{ URL::to('asset/'. $asset->id.'/delete') }}">Delete</a>
        @if (count($asset->assetrepairs)>=1)
        <div class="row">
            <p class="bg-primary text-white">This asset has {{ count($asset->assetrepairs) }} repairs<a class="btn btn-info" href="{{ URL::to('assetrepairs/'. $asset->id) }}" target="_blank">View Repairs</a></p>
        </div>
        @endif

        @include('asset.detail')
        
    </div>
</section>
@endsection
