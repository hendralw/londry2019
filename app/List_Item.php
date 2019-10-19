<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List_Item extends Model
{
    protected $table = "list_items";
    protected $primaryKey = 'list_items_id';
    public $timestamps = true;
    protected $fillable = ['item_categories_id', 'unit_items_id', 'durations_id', 'list_items_name', 'list_items_price'];

    public function item_category()
    {
        return $this->belongsTo('App\Item_Category', 'item_categories_id');
    }
}
