<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public static function getListForDropdown()
    {
        $vendors = Vendor::orderBy('company', 'ASC')->get();
        $vendorsForDropdown = $vendors->pluck('company','id');
        $vendorsForDropdown->all();

        return $vendorsForDropdown;
    }
}
