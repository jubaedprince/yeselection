<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'email', 'candidate_id'];

    protected $hidden = [];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function getVoteCount(){
        return $this->votes->count();
    }

}
