<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = "transaction_logs";
    protected $fillable = ['user_id', 'participant_id', 'question_id', 'answer', 'calc'];
}
