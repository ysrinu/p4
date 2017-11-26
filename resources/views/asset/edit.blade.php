@extends('layouts.master')

@section('title')
Edit Asset
@endsection


@section('content')
<section>
    <div class="container">
        <div class="row justify-content-center">
            <h2>
                Edit Asset
            </h2>
        </div>
        <div class="row justify-content-center">
            <form method='POST' action='/asset/{{ $result->id }}'>
                {{ method_field('put') }}
                {{ csrf_field() }}

                <div class="form-group row">
                    <label for="owner" class="col-sm-2 col-form-label">Owner</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="owner" id="owner" value='{{ $result->owner or old('owner') }}' maxlength="50" placeholder="Owner">
                        @if($errors->get('owner'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('owner') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="description" id="description" value='{{ $result->description or old('description') }}' maxlength="50" placeholder="Description">
                        @if($errors->get('description'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('description') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="purchase_price" class="col-sm-2 col-form-label">Purchase Price</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" class="form-control" name="purchase_price" id="purchase_price" value='{{ $result->purchase_price or old('purchase_price') }}' placeholder="Purchase Price">
                        @if($errors->get('purchase_price'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('purchase_price') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="purchase_date" class="col-sm-2 col-form-label">Purchase Date</label>
                    <div class="col-sm-10">
                        <input type="date" step="0.01" class="form-control" name="purchase_date" id="purchase_date" value='{{ $result->purchase_date or old('purchase_date') }}' placeholder="Purchase Date">
                        @if($errors->get('purchase_date'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('purchase_date') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="serial_number" class="col-sm-2 col-form-label">Serial Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="serial_number" id="serial_number" value='{{ $result->serial_number or old('serial_number') }}' maxlength="50" placeholder="Serial Number">
                        @if($errors->get('serial_number'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('serial_number') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="notes" id="notes" value='{{ $result->notes or old('notes') }}' maxlength="191" placeholder="Notes">
                        @if($errors->get('notes'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('notes') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="estimated_life_months" class="col-sm-2 col-form-label">Estimated life (months)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="estimated_life_months" id="estimated_life_months" value='{{ $result->estimated_life_months or old('estimated_life_months') }}' placeholder="Estimated life (months)">
                        @if($errors->get('estimated_life_months'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('estimated_life_months') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="out_of_service_date" class="col-sm-2 col-form-label">Out of Service Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="out_of_service_date" id="out_of_service_date" value='{{ $result->out_of_service_date or old('out_of_service_date') }}' placeholder="Out of Service Date">
                        @if($errors->get('out_of_service_date'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('out_of_service_date') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="assigned_to" class="col-sm-2 col-form-label">Assigned To</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="assigned_to" id="assigned_to" value='{{ $result->assigned_to or old('assigned_to') }}' maxlength="30" placeholder="Assigned To">
                        @if($errors->get('assigned_to'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('assigned_to') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="assigned_date" class="col-sm-2 col-form-label">Assigned Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="assigned_date" id="assigned_date" value='{{ $result->assigned_date or old('assigned_date') }}' placeholder="Assigned Date">
                        @if($errors->get('assigned_date'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('assigned_date') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tag" class="col-sm-2 col-form-label">Tag</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="tag" id="tag" value='{{ $result->tag or old('tag') }}' maxlength="10" placeholder="Tag">
                        @if($errors->get('tag'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('tag') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="assigned_date" class="col-sm-2 col-form-label">Scheduled Retirement Year</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control"  min="2017" max="9999" name='scheduled_retirement_year' id="scheduled_retirement_year" value='{{ $result->scheduled_retirement_year or old('scheduled_retirement_year') }}' placeholder="Scheduled Retirement Year">
                        @if($errors->get('scheduled_retirement_year'))
                        <ul class="alert alert-danger" role="alert">
                            @foreach($errors->get('scheduled_retirement_year') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Is Computer?</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name='is_computer' id='is_computer' onchange="showComputerForm()" {{ ($result->is_computer) ? 'CHECKED' : '' }}>
                                @if($errors->get('is_computer'))
                                <ul class="alert alert-danger" role="alert">
                                    @foreach($errors->get('is_computer') as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
                <div  style="display: block;" id="computer_form">
                    <div class="form-group row">
                        <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="memory" id="memory" value='{{ $result->memory or old('memory') }}' maxlength="30" placeholder="Memory">
                            @if($errors->get('memory'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('memory') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="model" class="col-sm-2 col-form-label">Model</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="model" id="model" value='{{ $result->model or old('model') }}' maxlength="30" placeholder="Model">
                            @if($errors->get('model'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('model') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="operating_system" class="col-sm-2 col-form-label">Operating System</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="operating_system" id="operating_system" value='{{ $result->operating_system or old('operating_system') }}' maxlength="30" placeholder="Operating System">
                            @if($errors->get('operating_system'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('operating_system') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mac_address" class="col-sm-2 col-form-label">MAC Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="mac_address" id="mac_address" value='{{ $result->mac_address or old('mac_address') }}' maxlength="30" placeholder="MAC Address">
                            @if($errors->get('mac_address'))
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->get('mac_address') as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    </div>
</section>

@endsection
