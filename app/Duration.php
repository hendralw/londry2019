<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $table = "durations";
    protected $primaryKey = 'durations_id';
    public $timestamps = true;
    protected $fillable = ['durations_name'];
}
