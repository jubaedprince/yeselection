<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voter extends Model
{
    protected $table = 'voters';

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'email', 'contact_number', 'batch_number'];

    protected $hidden = [];

    public function key(){
        return $this->hasOne('App\Key');
    }

}
