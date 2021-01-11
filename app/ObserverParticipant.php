<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObserverParticipant extends Model
{
    use SoftDeletes;

    protected $table = "observer_participants";
    protected $fillable = ['observer_id','participant_id','session'];
}
