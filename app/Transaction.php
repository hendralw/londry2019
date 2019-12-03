<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $primaryKey = 'transactions_id';
    public $timestamps = true;
    protected $fillable = ['customers_id', 'employees_id', 'total'];

    public function detail_transaksi()
    {
        return $this->hasMany('App\Transaction_Detail', 'detail_transactions_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee', 'employees_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customers_id');
    }
}
