<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutOfServiceCode extends Model
{
    protected $table = 'out_of_service_codes';

    public static function getListForDropdown()
    {
        $outOfServiceCodes = OutOfServiceCode::orderBy('reason', 'ASC')->get();
        $outOfServiceCodesForDropdown = $outOfServiceCodes->pluck('reason','id');
        $outOfServiceCodesForDropdown->all();

        return $outOfServiceCodesForDropdown;
    }
}
