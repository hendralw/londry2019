<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $table = "spendings";
    protected $primaryKey = 'spendings_id';
    public $timestamps = true;
    protected $fillable = ['branches_id', 'spending_categories_id', 'spendings_name', 'spendings_total', 'spendings_date'];

    public function item_category()
    {
        return $this->belongsTo('App\Item_Category', 'item_categories_id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branches_id');
    }
}
