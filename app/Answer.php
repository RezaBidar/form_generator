<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Form;
use App\User;
use App\Input;

class Answer extends Model
{
	protected $fillable = [
        'form_id' , 'user_id' , 'results' , 'ip' ,
    ];

    public static function store($results, Form $form, $user, $ip)
    {
    	$userId = ($user) ? $user->id : null ;
    	self::create([
    		'form_id' => $form->id,
    		'user_id' => $userId,
    		'ip' => $ip,
    		'results' => json_encode($results, JSON_UNESCAPED_UNICODE),
    		]);

    	return true; 
    }

    
}
