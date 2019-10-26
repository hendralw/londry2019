<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit_Item extends Model
{
    protected $table = "unit_items";
    protected $primaryKey = 'unit_items_id';
    public $timestamps = true;
    protected $fillable = ['unit_items_name'];
}
