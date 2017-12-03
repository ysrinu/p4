
<dl class="row">
    <dt class="col-sm-3">Id</dt>
    <dd class="col-sm-9"> {{ $asset->id }}</dd>

    <dt class="col-sm-3">Owner</dt>
    <dd class="col-sm-9"> {{ $asset->owner }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9"> {{ $asset->description }}</dd>

    <dt class="col-sm-3">Purchase Price</dt>
    <dd class="col-sm-9"> {{ $asset->purchase_price }}</dd>

    <dt class="col-sm-3">Purchase Date</dt>
    <dd class="col-sm-9"> {{ $asset->purchase_date }}</dd>

    <dt class="col-sm-3">Serial Number</dt>
    <dd class="col-sm-9"> {{ $asset->serial_number }}</dd>

    <dt class="col-sm-3">Notes</dt>
    <dd class="col-sm-9"> {{ $asset->notes }}</dd>

    <dt class="col-sm-3">Estimated life (months)</dt>
    <dd class="col-sm-9"> {{ $asset->estimated_life_months }}</dd>

    <dt class="col-sm-3">Assigned To</dt>
    <dd class="col-sm-9"> {{ $asset->assigned_to }}</dd>

    <dt class="col-sm-3">Assigned Date</dt>
    <dd class="col-sm-9"> {{ $asset->assigned_date }}</dd>

    <dt class="col-sm-3">Tag</dt>
    <dd class="col-sm-9"> {{ $asset->tag }}</dd>

    <dt class="col-sm-3">Scheduled Retirement Year</dt>
    <dd class="col-sm-9"> {{ $asset->scheduled_retirement_year }}</dd>

    <dt class="col-sm-3">Group</dt>
    <dd class="col-sm-9"> {{ $asset->group->description }}</dd>

    <dt class="col-sm-3">Location</dt>
    <dd class="col-sm-9"> {{ $asset->location->description }}</dd>

    <dt class="col-sm-3">Warranty</dt>
    <dd class="col-sm-9"> {{ $asset->warranty->description }}</dd>

    <dt class="col-sm-3">Vendor</dt>
    <dd class="col-sm-9"> {{ $asset->vendor->company }}</dd>

    <dt class="col-sm-3">Is Out of Service?</dt>
    <dd class="col-sm-9"> {{ $asset->is_out_of_service ? "Yes" : "No" }}</dd>

    @if ($asset->is_out_of_service)
    <dt class="col-sm-3">Out of Service Date</dt>
    <dd class="col-sm-9"> {{ $asset->out_of_service_date }}</dd>

    <dt class="col-sm-3">Out of Service Code</dt>
    <dd class="col-sm-9"> {{ $asset->outofservicecode->reason }}</dd>
    @endif

    <dt class="col-sm-3">Is Computer?</dt>
    <dd class="col-sm-9"> {{ $asset->is_computer ? "Yes" : "No" }}</dd>

    @if ($asset->is_computer)
    <dt class="col-sm-3">Computer Type</dt>
    <dd class="col-sm-9"> {{ $asset->computer->computertype->description }}</dd>

    <dt class="col-sm-3">Memory</dt>
    <dd class="col-sm-9"> {{ $asset->computer->memory }}</dd>

    <dt class="col-sm-3">Model</dt>
    <dd class="col-sm-9"> {{ $asset->computer->model }}</dd>

    <dt class="col-sm-3">Operating System</dt>
    <dd class="col-sm-9"> {{ $asset->computer->operating_system }}</dd>

    <dt class="col-sm-3">MAC Address</dt>
    <dd class="col-sm-9"> {{ $asset->computer->mac_address }}</dd>

    <dt class="col-sm-3">Created on</dt>
    <dd class="col-sm-9"> {{ $asset->created_at }}</dd>

    <dt class="col-sm-3">Updated on</dt>
    <dd class="col-sm-9"> {{ $asset->updated_at }}</dd>
    @endif
</dl>
