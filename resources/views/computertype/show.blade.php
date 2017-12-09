@extends('layouts.master')

@section('title')
View Computer Type {{ $computertype->id }}
@endsection


@section('content')

<section >
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                View Computer Type {{ $computertype->id }}
            </h2>
        </div>

        @include('computertype.detail')

    </div>
</section>
@endsection
