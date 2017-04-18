<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User ;

class Form extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title' , 'description', 'open_at', 'close_at' , 'only_once' , 'login_required' ,
    ];

    public static function getAll($userId)
    {
    	return self::where('user_id' , $userId) ;
    }

    public function inputs()
    {
    	return $this->hasMany('App\Input');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public static function store($data)
    {
    	$form = new Form ;
    	$form->user_id = $data["user_id"];
    	$form->title = $data["title"];
    	$form->description = isset($data["description"]) ? $data["description"] : '';
    	$form->open_at = isset($data["open_at"]) ? toGregorian($data["open_at"]) : '';
    	$form->close_at = isset($data["close_at"]) ? toGregorian($data["close_at"]) : '';
    	$form->only_once = isset($data["only_once"]) ? true : false;
    	$form->login_required = isset($data["login_required"]) ? true : false;
        $form->link = $data['link'];
    	$form->save();
    	return $form ;
    }

    public function patch($data)
    {
        $this->title = $data["title"];
        $this->description = isset($data["description"]) ? $data["description"] : '';
        $this->open_at = (isset($data["open_at"]) && validJalali($data["open_at"])) ? toGregorian($data["open_at"]) : null;
        $this->close_at =(isset($data["close_at"]) && validJalali($data["close_at"])) ? toGregorian($data["close_at"]) : null;

        $this->only_once = isset($data["only_once"]) ? true : false;
        $this->login_required = isset($data["login_required"]) ? true : false;
        $this->update();
        return $this ;   
    }

    
}
