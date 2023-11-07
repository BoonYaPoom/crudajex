<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'page';
    protected $primaryKey = 'page_id';
    protected $guarded =[];

    public $timestamps = false;
}
