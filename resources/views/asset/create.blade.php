@extends('layouts.master')

@section('title')
 New Asset
@endsection


@section('content')
<section class="engine"><a href="/">bootstrap modal popup</a></section><section class="mbr-section form1 cid-qAUFMxQIkB" id="form1-3" data-rv-view="44">
    <div class="container">
        <div class="row justify-content-center">
             <h1>Add a new asset</h1>
            </br>

             @if(count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </br>
            @endif


             <form method='POST' action='/asset'>
    {{ csrf_field() }}

    <label for='owner'>Owner</label> <input type='text' name='owner' id='owner' value='{{ $result->owner or old('owner') }}' maxlength="50"> </br>
    @if($errors->get('owner'))
        <ul class='alertdanger'>
        @foreach($errors->get('owner') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='description'>description</label> <input type='text' name='description' id='description' value='{{ $result->description or old('description') }}' maxlength="50"> </br>
    @if($errors->get('description'))
        <ul class='alertdanger'>
        @foreach($errors->get('description') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='purchase_price'>purchase_price</label> <input type="number" step="0.01" name='purchase_price' id='purchase_price' value='{{ $result->purchase_price or old('purchase_price') }}'> </br>
    @if($errors->get('purchase_price'))
        <ul class='alertdanger'>
        @foreach($errors->get('purchase_price') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='purchase_date'>purchase_date</label> <input type='date' name='purchase_date' id='purchase_date' value='{{ $result->purchase_date or old('purchase_date') }}'> </br>
    @if($errors->get('purchase_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('purchase_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='serial_number'>serial_number</label> <input type='text' name='serial_number' id='serial_number' value='{{ $result->serial_number or old('serial_number') }}' maxlength="50"> </br>
    @if($errors->get('serial_number'))
        <ul class='alertdanger'>
        @foreach($errors->get('serial_number') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='notes'>notes</label> <input type='text' name='notes' id='notes' value='{{ $result->notes or old('notes') }}' maxlength="191"> </br>
    @if($errors->get('notes'))
        <ul class='alertdanger'>
        @foreach($errors->get('notes') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='estimated_life_months'>estimated_life_months</label> <input type='number' name='estimated_life_months' id='estimated_life_months' value='{{ $result->estimated_life_months or old('estimated_life_months') }}'> </br>
    @if($errors->get('estimated_life_months'))
        <ul class='alertdanger'>
        @foreach($errors->get('estimated_life_months') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='out_of_service_date '>out_of_service_date</label> <input type='date' name='out_of_service_date ' id='out_of_service_date ' value='{{ $result->out_of_service_date or old('out_of_service_date') }}'> </br>
    @if($errors->get('out_of_service_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('out_of_service_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='assigned_to'>assigned_to</label> <input type='text' name='assigned_to' id='assigned_to' value='{{ $result->assigned_to or old('assigned_to') }}' maxlength="30"> </br>
    @if($errors->get('assigned_to'))
        <ul class='alertdanger'>
        @foreach($errors->get('assigned_to') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='assigned_date'>assigned_date</label> <input type='date' name='assigned_date' id='assigned_date' value='{{ $result->assigned_date or old('assigned_date') }}' maxlength="50"> </br>
    @if($errors->get('assigned_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('assigned_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='tag'>tag</label> <input type='text' name='tag' id='tag' value='{{ $result->tag or old('tag') }}' maxlength="10"> </br>
    @if($errors->get('tag'))
        <ul class='alertdanger'>
        @foreach($errors->get('tag') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='scheduled_retirement_year'>scheduled_retirement_year</label> <input type='number' min="2017" max="9999" name='scheduled_retirement_year' id='scheduled_retirement_year' value='{{ $result->scheduled_retirement_year or old('scheduled_retirement_year') }}'> </br>
    @if($errors->get('scheduled_retirement_year'))
        <ul class='alertdanger'>
        @foreach($errors->get('scheduled_retirement_year') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <label for='is_computer'>is_computer</label> <input type='checkbox' name='is_computer' id='is_computer' value='{{ $result->is_computer or old('is_computer') }}'> </br>
    @if($errors->get('is_computer'))
        <ul class='alertdanger'>
        @foreach($errors->get('is_computer') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <input type='submit' value='Add asset'>
</form>
        </div>
    </div>
</section>
@endsection
