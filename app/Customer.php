<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey = 'customers_id';
    public $timestamps = true;
    protected $fillable = ['customers_name', 'customers_address', 'customers_phone'];

    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'transactions_id');
    }
}

