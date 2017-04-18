<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreForm extends Request
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
        return [
            'title' => 'required',
            // 'description' => '',
            'open_at' => 'cm_valid_jalali',
            'close_at' => 'cm_valid_jalali|cm_jalali_greater_than:open_at',
            // 'only_once' => '' ,
            // 'login_rquired' => '' ,
        ];
    }
}
