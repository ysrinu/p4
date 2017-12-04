<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Computer;
use App\Group;
use App\Location;
use App\Vendor;
use App\Warranty;
use App\OutOfServiceCode;
use App\computerType;

class AssetController extends Controller
{

    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $assets = Asset::all();
            return view('asset.list')->with(['assets' => $assets]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $asset = Asset::findOrFail($n);
        return view('asset.show')->with(['asset' => $asset]);
    }

    //Display the form to add a new asset
    public function create(Request $request)
    {
        $asset = new Asset();

        return view('asset.create')->with([
            'asset' => $asset,
            'groupsForDropdown' => Group::getListForDropdown(),
            'locationsForDropdown' => Location::getListForDropdown(),
            'vendorsForDropdown' => Vendor::getListForDropdown(),
            'warrantiesForDropdown' => Warranty::getListForDropdown(),
            'outOfServiceCodesForDropdown' => OutOfServiceCode::getListForDropdown(),
            'computerTypesForDropdown' => ComputerType::getListForDropdown(),
        ]);
    }

    // Process the form for adding a new asset
    public function store(Request $request)
    {
        // validate input
        $this->validateInput($request);

        $asset = new Asset();
        $asset->owner = $request->input('owner');
        $asset->description = $request->input('description');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->tag = $request->input('tag');
        $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
        $asset->group_id = $request->input('group_id');
        $asset->location_id = $request->input('location_id');
        $asset->warranty_id = $request->input('warranty_id');
        $asset->vendor_id = $request->input('vendor_id');
        $asset->is_computer = $request->has('is_computer');
        $asset->is_out_of_service = $request->has('is_out_of_service');
        if ($request->has('is_out_of_service')) {
            $asset->out_of_service_id = $request->input('out_of_service_id');
            $asset->out_of_service_date = $request->input('out_of_service_date');
        }else {
            $asset->out_of_service_id = null;
            $asset->out_of_service_date = null;
        }
        $asset->save();

        // if Asset is computer then add Computer table entry
        if ($asset->is_computer) {
            $computer = new Computer();
            $computer->asset_id = $asset->id;
            $computer->computer_type_id = $request->input('computer_type_id');
            $computer->memory = $request->input('memory');
            $computer->model = $request->input('model');
            $computer->operating_system = $request->input('operating_system');
            $computer->mac_address = $request->input('mac_address');
            $computer->save();
        }

        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->id)->with('alert', 'Asset '.$id.' was Added.');
    }

    public function edit($id)
    {
        $asset = Asset::with([
            'computer',
            'group:id',
            'location:id',
            'vendor:id',
            'warranty:id',
            'outofservicecode:id'
            ])->find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' Not Found.');
            }

            return view('asset.edit')->with([
                'asset' => $asset,
                'groupsForDropdown' => Group::getListForDropdown(),
                'locationsForDropdown' => Location::getListForDropdown(),
                'vendorsForDropdown' => Vendor::getListForDropdown(),
                'warrantiesForDropdown' => Warranty::getListForDropdown(),
                'outOfServiceCodesForDropdown' => OutOfServiceCode::getListForDropdown(),
                'computerTypesForDropdown' => ComputerType::getListForDropdown(),
            ]);
        }

        public function update(Request $request, $id)
        {
            // validate input
            $this->validateInput($request);

            $asset = Asset::find($id);

            $asset->owner = $request->input('owner');
            $asset->description = $request->input('description');
            $asset->purchase_price = $request->input('purchase_price');
            $asset->purchase_date = $request->input('purchase_date');
            $asset->serial_number = $request->input('serial_number');
            $asset->estimated_life_months = $request->input('estimated_life_months');
            $asset->assigned_to = $request->input('assigned_to');
            $asset->assigned_date = $request->input('assigned_date');
            $asset->tag = $request->input('tag');
            $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
            $asset->group_id = $request->input('group_id');
            $asset->location_id = $request->input('location_id');
            $asset->warranty_id = $request->input('warranty_id');
            $asset->vendor_id = $request->input('vendor_id');
            $asset->is_computer = $request->has('is_computer');
            $asset->is_out_of_service = $request->has('is_out_of_service');
            if ($request->has('is_out_of_service')) {
                $asset->out_of_service_id = $request->input('out_of_service_id');
                $asset->out_of_service_date = $request->input('out_of_service_date');
            }else {
                $asset->out_of_service_id = null;
                $asset->out_of_service_date = null;
            }
            $asset->save();

            $computer = Computer::where('asset_id', '=', $id)->first();

            if ( $computer) {
                $computer->delete();    // delete any related computer record
            }

            // if Asset is computer then add Computer table entry
            if ($asset->is_computer) {
                $computer = new Computer();
                $computer->asset_id = $asset->id;
                $computer->computer_type_id = $request->input('computer_type_id');
                $computer->memory = $request->input('memory');
                $computer->model = $request->input('model');
                $computer->operating_system = $request->input('operating_system');
                $computer->mac_address = $request->input('mac_address');
                $computer->save();
            }

            return redirect('/asset/'.$id)->with('alert', 'Asset '.$id.' Saved.');
        }

        /*
        * Validate input fields, submitted by Create or Edit forms
        */
        private function validateInput(Request $request)
        {
            $this->validate($request, [
                'owner' => 'required|max:50',
                'description' => 'max:50',
                'notes' => 'max:191',
                'purchase_price' => 'required|numeric',
                'purchase_date' => 'required|date',
                'serial_number' => 'required|max:50',
                'estimated_life_months' => 'required|numeric',
                'tag' => 'required|alphanum|max:10',
                'scheduled_retirement_year' => 'required|numeric',
                'assigned_to' => 'required|alpha|max:30',
                'assigned_date' => 'required|date',
                'group_id' => 'required|numeric',
                'location_id' => 'required|numeric',
                'vendor_id' => 'required|numeric',
                'warranty_id' => 'required|numeric',
            ]);

            if ($request->has('is_out_of_service')) {
                $this->validate($request, [
                    'out_of_service_id' => 'required|numeric',
                    'out_of_service_date' => 'required|date',
                ]);
            }

            if ($request->has('is_computer')) {
                $this->validate($request, [
                    'computer_type_id' => 'required|numeric',
                    'memory' => 'required|max:30',
                    'model' => 'required|max:30',
                    'operating_system' => 'required|max:30',
                    'mac_address' => 'required|max:30',
                ]);
            }
        }

        /*
        * Asks user to confirm they actually want to delete the assetk
        * GET
        * /asset/{id}/delete
        */
        public function delete($id)
        {
            $asset = Asset::find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' is Not Found.');
            }

            return view('asset.delete')->with([
                'asset' => $asset,
                'previousUrl' => url()->previous() == url()->current() ? '/asset' : url()->previous(),
            ]);
        }

        /*
        * Actually deletes the asset
        * DELETE
        * /asset/{id}/delete
        */
        public function destroy($id)
        {
            $asset = Asset::find($id);

            if (!$asset) {
                return redirect('/asset')->with('alert', 'Asset '.$id.' is Not Found.');
            }

            if ($asset->computer) {
                $asset->computer->delete();
                $asset->delete();
            }

            //$asset->assetrepairs()->detach();

            $asset->delete();
            return redirect('/')->with('alert', 'Asset '.$asset->id.' Deleted.');
        }

    }
