<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = "branches";
    protected $primaryKey = 'branches_id';
    public $timestamps = true;
    protected $fillable = ['branches_name', 'branches_address', 'branches_phone'];

    public function employee()
    {
        return $this->hasMany('App\Employee', 'branches_id');
    }

    public function spending()
    {
        return $this->hasMany('App\Spending', 'branches_id');
    }
}
