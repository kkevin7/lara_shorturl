<?php

namespace App\Models;

use App\Classes\CodeGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'url', 'expirtation'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function short_url($long_url)
    {
        $url = self::create([
            'url' => $long_url,
            'user_id' => Auth::user()->id,
        ]);

        //Generación del código
        $code = (new CodeGenerator())->get_code($url->id);

        //Actualizar el código en la url
        $url->code = $code;
        $url->save();

        return $url->code;
    }
}
