<?php 

use \Auth;
use \Request;
use \URL;

if (! function_exists('showMenu')) {
    /**
     * make menu from array
     *
     * @return text
     */
    function showMenu()
    {
        $menu = config('app.menu') ;

        $text = '' ;
        

        foreach ($menu as $name => $item)
        {
            $active = false ;
            
            if(isset($item['dropdown']))
            {
                $text .= '<li class="dropdown menu-'. $name .'">' . PHP_EOL ;
                $text .= '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> '. PHP_EOL;
            }
            else 
            {
                $text .= '<li class="menu-'. $name .'">' . PHP_EOL ;
                $text .= '<a href="'.(isset($item['action']) ? route($item['action']) : '' ).'">' . PHP_EOL;
            }

            $text .= '<i class="'. $item['icon'] .'"></i>'. PHP_EOL;
            $text .= '<span>'. $item['title'] .'</span>'. PHP_EOL;
            
            if(isset($item['dropdown']))
            {
                $text .= '<b class="caret"></b>';
                $text .= '</a>'. PHP_EOL;
                $text .= '<ul class="dropdown-menu">' ;
                foreach ($item['dropdown'] as $subName => $subItem) 
                {
                    $text .= '<li>' . PHP_EOL ;
                    $text .= '<a href="'.(isset($subItem['action']) ? route($subItem['action']) : '' ).'">' . PHP_EOL;
                    $text .= '<span>'. $subItem['title'] .'</span>'. PHP_EOL;
                    $text .= '</a>'. PHP_EOL;       
                    $text .= '</li>'. PHP_EOL;

                    $active = (!$active && isset($subItem['action'])) 
                                ? $subItem['action'] == Request::route()->getName() : $active ;        
                }
                $text .= '</ul>' ;
            }
            else 
            {
                $text .= '</a>'. PHP_EOL;
                $active = (!$active && isset($item['action'])) 
                                ? $item['action'] == Request::route()->getName() : $active ;
            }

            $text .= '</li>'. PHP_EOL;

            if($active)
            {
                $text = str_replace('menu-'. $name , 'active', $text);
            }
        }

        return $text ;
    }
}




if(! function_exists('removeBr'))
{
    function removeBr($str)
    {
        return preg_replace("#<br />#", "**", $str);
    }
}

if(! function_exists('toGregorian'))
{
    function toGregorian($str)
    {
            $d = explode('/',$str) ;
            return implode('-' , Morilog\Jalali\jDateTime::toGregorian($d[2], $d[1], $d[0]));
    }
}

if(! function_exists('toJalali'))
{
    function toJalali($str)
    {
            $d = explode('-',$str) ;
            $jd = Morilog\Jalali\jDateTime::toJalali($d[0], $d[1], $d[2]) ;
            return $jd[2] . '/' . $jd[1] . '/' . $jd[0] ;
    }
}

if(! function_exists('validJalali'))
{
    function validJalali($value)
    {
            $date = explode( '/', $value);
            if(sizeof($date) != 3)
                return false ;
            return  Morilog\Jalali\jDateTime::checkDate($date[2], $date[1], $date[0]); 
    }
}




if(! function_exists('makeInput'))
{
    function makeInput(App\Input $input)
    {
        $type = null ;
        $rLabel = ($input->required) ? '(ضروری)' : '' ;
        switch($input->type)
        {
            case App\Input::TYPE_TEXT : 
                return BootForm::text('i_' . $input->id , $input->label . $rLabel , '' , ['help_text' => $input->help] );
                break;
            case App\Input::TYPE_DATE : 
                return BootForm::text('i_' . $input->id , $input->label . $rLabel , '' , ['help_text' => $input->help , 'class' => 'datepicker'] );
                break;
            case App\Input::TYPE_NUMBER : 
                return BootForm::number('i_' . $input->id , $input->label . $rLabel , '' , ['help_text' => $input->help , 'min' => $input->getMin() , 'max' => $input->getMax()] );
                break;
            case App\Input::TYPE_MULTISELECT : 
                // Log::info($input->getSelectChoices());
                return BootForm::select('i_' . $input->id , $input->label . $rLabel , $input->getSelectChoices(), '' , ['help_text' => $input->help] );
                break;
        }

        return null ;
    }
}
