<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flag extends Model
{
    protected $table = 'flags';

    protected $fillable = ['run_election'];

    protected $hidden = [];

}
