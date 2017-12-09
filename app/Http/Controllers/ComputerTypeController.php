<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComputerType;

class ComputerTypeController extends Controller
{
    public function index($n = null)
    {
        if (is_null($n)) {
            // Get all rows
            $computertypes = ComputerType::all();
            return view('computertype.list')->with(['computertypes' => $computertypes]);
        }

        # Get row by id or
        # Throw an exception if the lookup fails
        $computertype = ComputerType::findOrFail($n);
        return view('computertype.show')->with(['computertype' => $computertype]);
    }
}
