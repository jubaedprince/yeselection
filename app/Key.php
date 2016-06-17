<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{

    protected $table = 'keys';

    protected $fillable = ['voter_id', 'key', 'voted'];

    protected $hidden = [];

    public function voter()
    {
        return $this->belongsTo('App\Voter');
    }

    public static function createKey($voter){
        return Key::create([
            'voter_id'  => $voter->id,
            'key'       => rand(1,999999999), //TODO:: make this more random later
            'voted'     => false
        ]);
    }

}
