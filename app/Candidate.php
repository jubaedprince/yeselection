<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;

    protected $table = 'candidates';

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'email', 'candidate_id'];

    protected $hidden = [];

    protected $dates = ['deleted_at'];
}
