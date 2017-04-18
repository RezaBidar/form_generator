<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{

	const TYPE_TEXT = "text" ;
	const TYPE_DATE = "date" ;
	const TYPE_MULTISELECT = "multiselect" ;
	const TYPE_NUMBER = "number" ;

  public $timestamps = false;
  
  public function form()
  {
      return $this->belongsTo('App\Form');
  }

    public function getMin()
    {
      $minmax = explode($this->validation , '-' ) ;
      if(sizeof($minmax) == 2)
        return ($minmax[0] != 'null') ? $minmax[0] : '' ;
      return ''; 
    }

    public function getMax()
    {
    	$minmax = explode($this->validation , '-' ) ;
      if(sizeof($minmax) == 2)
        return ($minmax[1] != 'null') ? $minmax[1] : '' ;
      return '';
    }

    public function getSelectChoices()
    {
      $c = array_map('trim', explode('-' , $this->validation ));
      $choices = [''] ;
      foreach($c as $choice)
        $choices[$choice] = $choice ;
      return  $choices;
    }

    public function getValidation()
   	{
   		$validation = '';
   		if($this->required)
   			$validation .= 'required' ;

   		switch($this->type)
   		{
   			case self::TYPE_DATE :
          $minmaxdate = explode('-' , $this->validation) ;
          $validation .= '|cm_valid_jalali' ;
          if(sizeof($minmaxdate) == 2){
            if($minmaxdate[0] != 'null')
              $validation .= '|cm_min_jalali:' . $minmaxdate[0] ;
            if($minmaxdate[1] != 'null')
              $validation .= '|cm_max_jalali:' . $minmaxdate[1] ; 
          }
   				break ;
   			case self::TYPE_MULTISELECT :
   				$validation .= '|cm_in_choices:' . $this->validation ;
   				break ;
   			case self::TYPE_NUMBER :
   				$minmax = explode('-' , $this->validation) ;
   				$validation .= '|numeric' ;
          if(sizeof($minmax) == 2){
            if($minmax[0] != 'null')
     				  $validation .= '|min:' . $minmax[0] ;
            if($minmax[1] != 'null')
              $validation .= '|max:' . $minmax[1] ; 
          }
   				break;
   			case self::TYPE_TEXT :
          if($this->validation)
   				  $validation .= '|regex:/' . $this->validation .'/' ;
   				break;
   		}
      if(starts_with($validation , '|'))
        $validation = substr($validation , 1);
   		return $validation ;
   	}
}
