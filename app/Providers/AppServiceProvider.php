<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Morilog\Jalali\jDateTime;
use App\Form as Form;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Validator::extend('cm_jalalidate', function ($attribute, $value, $parameters, $validator) {
        //     $date = explode($value , '/');
        //     try{
        //         return jDateTime::checkDate($date[0], $date[1], $date[2]);
        //     }
        //     catch(Exception $d)
        //     {
        //         return false ;
        //     }
        // });

        Validator::extend('cm_in_choices', function ($attribute, $value, $parameters, $validator) {
            $choices = array_map('trim', explode('-' , $parameters[0] ));
            return in_array(trim($value) , $choices);
        });

    

        Validator::extend('cm_max_jalali', function ($attribute, $value, $parameters, $validator) {
            $maxTime = $parameters[0] ;
            $da = explode('/',$value) ;
            $d = implode('-' , jDateTime::toGregorian($da[2], $da[1], $da[0]));
            $time = strtotime($d);

            return ($time <= $maxTime) ? true : false ;
        });

        Validator::extend('cm_min_jalali', function ($attribute, $value, $parameters, $validator) {
            $minTime = $parameters[0] ;
            $da = explode('/',$value) ;
            $d = implode('-' , jDateTime::toGregorian($da[2], $da[1], $da[0]));
            $time = strtotime($d);

            return ($time >= $minTime) ? true : false ;
        });

        Validator::extend('cm_valid_jalali', function ($attribute, $value, $parameters, $validator) {
            $date = explode( '/', $value);
            if(sizeof($date) != 3)
                return false ;
            // Log::info($date);
            // checkDate($year, $month, $day, [$isJalali = true])
            return  jDateTime::checkDate($date[2], $date[1], $date[0]); // false

        });

        Validator::extend('cm_jalali_greater_than', function ($attribute, $value, $parameters, $validator) {
            $request = $validator->getData() ;
            if(empty($request[$parameters[0]]))
                return true ;
            try{
                $date2ar = explode('/',$request[$parameters[0]] );
                $date1ar = explode('/',$value) ;
                // Log::info($date2ar);
                // Log::info($date1ar);
                $dd1 = implode('-' , jDateTime::toGregorian($date1ar[2], $date1ar[1], $date1ar[0]));
                $dd2 = implode('-' , jDateTime::toGregorian($date2ar[2], $date2ar[1], $date2ar[0]));
                $date1 = strtotime($dd1);
                $date2 = strtotime($dd2);

                if($date1 >= $date2)
                    return true ;
            }catch(Exception $e)
            {
                Log::info($e->getMessage());
                return false ;
            }

            return false ;
        });

        Validator::extend('cm_greater_than', function ($attribute, $value, $parameters, $validator) {
            $request = $validator->getData() ;
            if(empty($request[$parameters[0]]) || $value >= $request[$parameters[0]])
                return true ;

            return false ;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
