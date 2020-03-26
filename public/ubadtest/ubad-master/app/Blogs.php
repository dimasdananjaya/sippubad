<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{

    protected $table = 'blogs';
    public $timestamps = true;
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
