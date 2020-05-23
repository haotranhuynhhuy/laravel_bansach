<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table="billsdetail";

    public function sach()
    {
    	return $this->belongsTo('App\Sach','id_product','id');
    }

    public function bill()
    {
    	return $this->belongsTo('App\Bill','id_bill','id');
    }
}
