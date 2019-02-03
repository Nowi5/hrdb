<?php

namespace App\Models;

use App\Models\BaseModel;

class Invite extends BaseModel
{
    protected $table = 'invites';

    protected $fillable = [
        'user_id', 'token'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            if(!isset($model->token))  {
                $model->token =  self::generateToken(8);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    protected static function generateToken($length = 8){
        $str = "";
        $characters = array_merge(range('A','Z'), range('1','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }

}
