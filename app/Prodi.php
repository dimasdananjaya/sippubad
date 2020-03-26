<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    public $timestamps = true;
    public $primaryKey='id_prodi';
}
