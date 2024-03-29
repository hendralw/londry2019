<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction_Detail extends Model
{
    protected $table = "detail_transactions";
    protected $primaryKey = 'detail_transactions_id';
    public $timestamps = true;
    protected $fillable = ['transactions_id','list_items_id', 'quantity', 'sub_total'];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaction', 'transactions_id');
    }

    public function list_item()
    {
        return $this->belongsTo('App\List_Item', 'list_items_id');
    }
}
