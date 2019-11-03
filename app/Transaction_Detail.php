<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    protected $table = "detail_transactions";
    protected $primaryKey = 'detail_transactions_id';
    public $timestamps = true;
    protected $fillable = ['transactions_id', 'amount', 'sub_total'];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaction', 'transactions_id');
    }
}
