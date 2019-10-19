<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending_Category extends Model
{
    protected $table = "spending_categories";
    protected $primaryKey = 'spending_categories_id';
    public $timestamps = true;
    protected $fillable = ['spending_categories_name'];

    public function spending()
    {
        return $this->hasMany('App\Spending', 'spending_categories_id');
    }
}
