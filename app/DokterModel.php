<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    protected $table = 't_dokter';
    public $timestamps = false;
    protected $guarded = [];
}
