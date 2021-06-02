<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','code','url','expirtation'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
