<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdministrasiModel extends Model
{
	protected $table = 't_administrasi';
    public $timestamps = false;
    protected $guarded = [];
}
