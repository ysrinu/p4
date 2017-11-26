<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function assetrepairs()
    {
        return $this->hasMany('App\AssetRepair');
    }

    public function computer()
    {
        return $this->hasOne('App\Computer');
    }

}
