<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function assetrepairs()
    {
        return $this->hasMany('App\AssetRepair');
    }

    public function computers()
    {
        return $this->hasMany('App\Computer');
    }

}
