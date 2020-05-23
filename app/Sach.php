<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table="sach";
    public function loaisach()
    {
    	return $this->belongsTo('App\LoaiSach','id_type','id');
    }

    public function bill_detail()
    {
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
