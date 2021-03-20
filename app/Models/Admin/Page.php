<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    // public function submenus()
    // {
    //     return $this ->hasMany('App\Models\Admin\Subpage')->where('status','1');
    // }

    public function submenus()
    {
        return $this->hasMany(Subpage::class);
    }
}
