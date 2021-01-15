<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Participant extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $table = "participants";
    protected $fillable= ['name', 'user_id', 'school','phone', 'absent','point_1','point_2','point_3','point_4','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
