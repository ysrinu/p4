<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    public static function getListForDropdown()
    {
        $warranties = Warranty::orderBy('description', 'ASC')->get();
        $warrantiesForDropdown = $warranties->pluck('description','id');
        $warrantiesForDropdown->all();

        return $warrantiesForDropdown;
    }
}
