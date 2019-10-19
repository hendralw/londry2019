<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $primaryKey = 'roles_id';
    public $timestamps = true;
    protected $fillable = ['roles_name', 'roles_code'];

    public function employee()
    {
        return $this->hasMany('App\Employee', 'roles_id');
    }
}
