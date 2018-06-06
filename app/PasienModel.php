<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasienModel extends Model
{
    protected $table = 't_pasien';
    public $timestamps = false;
    protected $guarded = [];
}
