<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biaya_Prodi extends Model
{
    protected $table = 'biaya_prodi';
    public $timestamps = false;
    public $primaryKey='id_biaya';
}
