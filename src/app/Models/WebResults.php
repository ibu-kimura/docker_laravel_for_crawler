<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable

class WebResults extends Model
{
    use Sortable;
    public $sortable = ['created','alerted',alert_cnt];
}
