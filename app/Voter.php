<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voter extends Model
{
    use SoftDeletes;

    protected $table = 'voters';

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'email', 'contact_number', 'batch_number'];

    protected $hidden = [];

    protected $dates = ['deleted_at'];
}
