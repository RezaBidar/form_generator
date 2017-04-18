<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Input;
use Log;

class StoreInput extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $type = $this->input('type');
        switch($type){
            case Input::TYPE_TEXT :
                return [
                    'label' => 'required' ,
                    'form_id' => 'required|exists:forms,id',
                    'help' => 'present' ,
                    'validation' => 'present' ,
                    'required' => '' ,
                ];
                break ;
            case Input::TYPE_DATE :
                return [
                    'label' => 'required' ,
                    'form_id' => 'required|exists:forms,id'  ,
                    'from' => 'present|cm_valid_jalali' ,
                    'to' => 'present|cm_valid_jalali|cm_jalali_greater_than:from' ,
                    'help' => 'present' ,
                    'required' => '' ,
                ];
                break;
            case Input::TYPE_NUMBER :
                return [
                    'label' => 'required' ,
                    'form_id' => 'required|exists:forms,id'  ,
                    'from' => 'present|integer' ,
                    'to' => 'present|integer|cm_greater_than:from' ,
                    'help' => 'present' ,
                    'required' => '' ,
                ];
                break;
            case Input::TYPE_MULTISELECT :
                return [
                    'label' => 'required' ,
                    'form_id' => 'required|exists:forms,id'  ,
                    'choices' => 'required'  ,
                    'help' => 'present' ,
                    'required' => '' ,
                ];
                break;
        }

        return [
            'type' => 'required|cm_in_choices:' . Input::TYPE_DATE . '-'
                                                . Input::TYPE_TEXT . '-'
                                                . Input::TYPE_NUMBER . '-'
                                                . Input::TYPE_MULTISELECT  ,
        ] ;
    }
}
