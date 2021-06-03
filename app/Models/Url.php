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

    // public function short_url($long_url){
    //     //Crear Url
    //     $url = self::create([
    //         'url' => $long_url,
    //         'user_id' => auth()->user()->id
    //     ]);

    //     //Generar codigo
    //     $code = (new CodeGenerator())->get_code($url->id);

    //     //Actualizar URL
    //     $url->code = $code;
    //     $url->save();

    //     //Retornar código
    //     return $url->code;
    // }
}
