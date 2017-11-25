@extends('layouts.master')

@section('title')
 Edit Asset
@endsection


@section('content')
<section class="engine"><a href="/">bootstrap modal popup</a></section><section class="mbr-section form1 cid-qAUFMxQIkB" id="form1-3" data-rv-view="44">
    <div class="container">
        <div class="row justify-content-center">
             <h1>Edit asset</h1>
            <br />


<form method='POST' action='/asset/{{ $result->id }}'>
    {{ method_field('put') }}
    {{ csrf_field() }}
    </br>
    <label for='owner'>Owner</label> <input type='text' name='owner' id='owner' value='{{ $result->owner or old('owner') }}' maxlength="50"> </br>
    @if($errors->get('owner'))
        <ul class='alertdanger'>
        @foreach($errors->get('owner') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='description'>Description</label> <input type='text' name='description' id='description' value='{{ $result->description or old('description') }}' maxlength="50"> </br>
    @if($errors->get('description'))
        <ul class='alertdanger'>
        @foreach($errors->get('description') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='purchase_price'>Purchase Price</label> <input type="number" step="0.01" name='purchase_price' id='purchase_price' value='{{ $result->purchase_price or old('purchase_price') }}'> </br>
    @if($errors->get('purchase_price'))
        <ul class='alertdanger'>
        @foreach($errors->get('purchase_price') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='purchase_date'>Purchase Date</label> <input type='date' name='purchase_date' id='purchase_date' value='{{ $result->purchase_date or old('purchase_date') }}'> </br>
    @if($errors->get('purchase_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('purchase_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='serial_number'>Serial Number</label> <input type='text' name='serial_number' id='serial_number' value='{{ $result->serial_number or old('serial_number') }}' maxlength="50"> </br>
    @if($errors->get('serial_number'))
        <ul class='alertdanger'>
        @foreach($errors->get('serial_number') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='notes'>Notes</label> <input type='text' name='notes' id='notes' value='{{ $result->notes or old('notes') }}' maxlength="191"> </br>
    @if($errors->get('notes'))
        <ul class='alertdanger'>
        @foreach($errors->get('notes') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='estimated_life_months'>Estimated life (months)</label> <input type='number' name='estimated_life_months' id='estimated_life_months' value='{{ $result->estimated_life_months or old('estimated_life_months') }}'> </br>
    @if($errors->get('estimated_life_months'))
        <ul class='alertdanger'>
        @foreach($errors->get('estimated_life_months') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='out_of_service_date '>Out of Service Date</label> <input type='date' name='out_of_service_date ' id='out_of_service_date ' value='{{ $result->out_of_service_date or old('out_of_service_date') }}'> </br>
    @if($errors->get('out_of_service_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('out_of_service_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='assigned_to'>Assigned To</label> <input type='text' name='assigned_to' id='assigned_to' value='{{ $result->assigned_to or old('assigned_to') }}' maxlength="30"> </br>
    @if($errors->get('assigned_to'))
        <ul class='alertdanger'>
        @foreach($errors->get('assigned_to') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='assigned_date'>Assigned Date</label> <input type='date' name='assigned_date' id='assigned_date' value='{{ $result->assigned_date or old('assigned_date') }}' maxlength="50"> </br>
    @if($errors->get('assigned_date'))
        <ul class='alertdanger'>
        @foreach($errors->get('assigned_date') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='tag'>Tag</label> <input type='text' name='tag' id='tag' value='{{ $result->tag or old('tag') }}' maxlength="10"> </br>
    @if($errors->get('tag'))
        <ul class='alertdanger'>
        @foreach($errors->get('tag') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
    <label for='scheduled_retirement_year'>Scheduled Retirement Year</label> <input type='number' min="2017" max="9999" name='scheduled_retirement_year' id='scheduled_retirement_year' value='{{ $result->scheduled_retirement_year or old('scheduled_retirement_year') }}'> </br>
    @if($errors->get('scheduled_retirement_year'))
        <ul class='alertdanger'>
        @foreach($errors->get('scheduled_retirement_year') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <label for='is_computer'>Is Computer?</label> <input type='checkbox' name='is_computer' id='is_computer' onchange="showComputerForm()" {{ ($result->is_computer) ? 'CHECKED' : '' }} > </br>
    @if($errors->get('is_computer'))
        <ul class='alertdanger'>
        @foreach($errors->get('is_computer') as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif

    <div  style="display: block;" id="computer_form">
        <label for='memory'>Memory</label> <input type='text' name='memory' id='memory' value='{{ $result->memory or old('memory') }}' maxlength="30"> </br>
        @if($errors->get('memory'))
            <ul class='alertdanger'>
            @foreach($errors->get('memory') as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <label for='model'>Model</label> <input type='text' name='model' id='model' value='{{ $result->model or old('model') }}' maxlength="30"> </br>
        @if($errors->get('model'))
            <ul class='alertdanger'>
            @foreach($errors->get('model') as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <label for='operating_system'>Operating System</label> <input type='text' name='memory' id='operating_system' value='{{ $result->operating_system or old('operating_system') }}' maxlength="30"> </br>
        @if($errors->get('operating_system'))
            <ul class='alertdanger'>
            @foreach($errors->get('operating_system') as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <label for='mac_address'>MAC Address</label> <input type='text' name='mac_address' id='mac_address' value='{{ $result->mac_address or old('mac_address') }}' maxlength="30"> </br>
        @if($errors->get('mac_address'))
            <ul class='alertdanger'>
            @foreach($errors->get('mac_address') as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
    </div>

    <input type='submit' value='Save asset'>
</form>
        </div>
    </div>
</section>

@endsection
