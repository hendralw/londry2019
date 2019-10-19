<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $primaryKey = 'employees_id';
    public $timestamps = true;
    protected $fillable = ['branches_id', 'roles_id', 'status_id', 'employees_name', 'employees_phone', 'employees_address', 'employees_salary', 'username', 'password'];

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branches_id');
    }
    public function role()
    {
        return $this->belongsTo('App\Role', 'roles_id');
    }
    // public function status()
    // {
    //     return $this->belongsTo('App\Branch', 'branches_id');
    // }
}
