<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPembayaran extends Model
{
    protected $table = 'status_pembayaran';
    public $timestamps = false;
    public $primaryKey='id_status_pembayaran';
}
