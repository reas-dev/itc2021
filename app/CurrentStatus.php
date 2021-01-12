<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrentStatus extends Model
{
    use SoftDeletes;

    protected $table = "current_status";
    protected $fillable = ['session','question'];
}
