<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSach extends Model
{
    protected $table="loaisach";
    public function sanphamsach()
    {
    	return $this->hasMany('App\Sach','id_type','id');
    }
}
