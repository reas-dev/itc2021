<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Question extends Model
{
    use SoftDeletes;
    use Sortable;

    protected $table = "questions";
    protected $fillable = ['session','question','answer_key','option_a','option_b','option_c','option_d'];
}
