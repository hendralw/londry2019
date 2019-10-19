<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_Category extends Model
{
    protected $table = "item_categories";
    protected $primaryKey = 'item_categories_id';
    public $timestamps = true;
    protected $fillable = ['item_categories_name'];

    public function list_item()
    {
        return $this->hasMany('App\List_Item', 'item_categories_id');
    }
}
