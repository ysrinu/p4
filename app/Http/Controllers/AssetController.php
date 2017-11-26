<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $result = Asset::all();
            //dump($result->toArray());
            return view('asset.show')->with(['result' => $result]);
            //return;
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $result = Asset::findOrFail($n);
        //dump($result->toArray());

        //dump($result->computer);

        return view('asset.show')->with(['result' => $result]);
    }

    //Display the form to add a new asset
    public function create(Request $request)
    {
        return view('asset.create');
    }

    // Process the form for adding a new asset
    public function store(Request $request)
    {
        $this->validate($request, [
            'owner' => 'required|max:50',
            'description' => 'max:50',
            'notes' => 'max:191',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|alphanum',
            'estimated_life_months' => 'required|numeric',
            'tag' => 'required|alphanum',
            'scheduled_retirement_year' => 'required|numeric',
            'assigned_to' => 'required|alpha',
            'assigned_date' => 'required|date',
        ]);


        $asset = new Asset();
        $asset->owner = $request->input('owner');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->tag = $request->input('tag');
        $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
        $asset->group_id = 1;
        $asset->location_id = 1;
        $asset->warranty_id = 1;
        $asset->vendor_id = 1;
        $asset->out_of_service_id = 1;
        $asset->is_computer = $request->has('is_computer');
        $asset->save();

        //dump($asset);
        # Redirect the user to the page to view the asset
        return redirect('/asset/'.$asset->id)->with('alert', 'Your asset was added.');
    }

    public function edit($id)
    {
        $result = Asset::find($id);

        if (!$result) {
            return redirect('/asset')->with('alert', 'Asset not found.');
        }

        //$ar = Asset::find($id)->assetrepairs;
        //dump($ar);
        //dump('$result is:');
        //dump($result);
        //dump('$result->assetrepairs is:');
        //dump($result->assetrepairs);
        //dump($result->computers);
        return view('asset.edit')->with(['result' => $result]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'owner' => 'required|max:50',
            'description' => 'max:50',
            'notes' => 'max:191',
            'purchase_price' => 'required|numeric',
            'purchase_date' => 'required|date',
            'serial_number' => 'required|alphanum|max:50',
            'estimated_life_months' => 'required|numeric',
            'tag' => 'required|alphanum|max:10',
            'scheduled_retirement_year' => 'required|numeric',
            'assigned_to' => 'required|alpha|max:30',
            'assigned_date' => 'required|date',
        ]);

        $asset = Asset::find($id);

        $asset->owner = $request->input('owner');
        $asset->purchase_price = $request->input('purchase_price');
        $asset->purchase_date = $request->input('purchase_date');
        $asset->serial_number = $request->input('serial_number');
        $asset->estimated_life_months = $request->input('estimated_life_months');
        $asset->assigned_to = $request->input('assigned_to');
        $asset->assigned_date = $request->input('assigned_date');
        $asset->tag = $request->input('tag');
        $asset->scheduled_retirement_year = $request->input('scheduled_retirement_year');
        $asset->group_id = 1;
        $asset->location_id = 1;
        $asset->warranty_id = 1;
        $asset->vendor_id = 1;
        $asset->out_of_service_id = 1;
        $asset->is_computer = $request->has('is_computer');
        $asset->save();

        return redirect('/asset/'.$id)->with('alert', 'Your changes were saved.');
    }

    public function delete($id)
    {
        $result = Asset::find($id);

        if (!$result) {
            return redirect('/asset')->with('alert', 'Asset not found.');
        }

        $result->delete();
        return redirect('/')->with('alert', 'Asset '.$result->id.' Deleted.');
    }

}
