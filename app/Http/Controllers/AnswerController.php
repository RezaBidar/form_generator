<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Form;
use App\Answer;
use App\Input;
use Excel;
use Auth;
use Gate;

class AnswerController extends Controller
{
    //excel doesnt work 
    public function export(){
    	

		// $users = [['abbas' , 'ghaderi'], ['reza' , 'bidar']];
		// Excel::create('users', function($excel) use($users) {
		//     $excel->sheet('Sheet 1', function($sheet) use($users) {
		//         $sheet->fromArray($users);
		//     });
		// })->export('xls');


    }

    /**
     * show form for answers
     * @param  [type]  $link    [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function showForm($link, Request $request)
    {
        $form = Form::where('link' , $link)->first();
        if(! $form)
            return abort(404);
        
        $user = Auth::user();
        //check loginrequired
        if($form->login_required && !$user)
            return redirect('login')->withError('ابتدا لوگین شوید و مجدد تلاش کنید');

        //between open and close
        $now = time();
        if(($form->open_at && $now < strtotime($form->open_at)) ||
            ($form->close_at && $now > strtotime($form->close_at))
            )
        {
            if($form->open_at && $form->close_at)
                $message = 'این فرم از تاریخ ' . toJalali($form->open_at) . ' تا تاریخ ' . toJalali($form->close_at) . ' قابل دسترس میباشد' ;
            elseif($form->open_at)
                $message = 'این فرم از تاریخ ' . toJalali($form->open_at) . ' به بعد قابل دسترس میباشد' ;
            else
                $message = 'این فرم تا تاریخ ' . toJalali($form->close_at) . ' قابل دسترس بود' ;

            return view('message')->withTitle('خطا')
                                    ->withMessage($message);
        }
        //check onlyonce
        if($form->only_once)
        {
            $answer = '' ;
            if($form->login_required)
                $answer = Answer::where(['user_id' => $user->id , 'form_id' => $form->id])->first() ;
            else
                $answer = Answer::where(['ip' => $request->ip() , 'form_id' => $form->id])->first() ;

            if($answer)
                return view('message')->withTitle('خطا')
                                    ->withMessage('شما قبلا پاسخ داده اید و نمیتوانید بیشتر از یک بار پاسخ دهید');

        }
        return view('answer.form' , compact('form'));
    }

    /**
     * add answers for a form
     * @param  Request $request 
     * @return 
     */
    public function submit(Request $request){
        $values = $request->except('_token');
        $ip = $request->ip();
        $user = Auth::user() ;
        $form = Form::findOrFail($request->form_id) ;
        $inputs = [];
        $validations = [] ;
        foreach($values as $key => $value)
        {

            if(starts_with($key , 'i_'))
            {
                $id = substr($key , 2);
                $input = Input::find($id);
                $validations[$key] = $input->getValidation() ;
                $inputs[$id] = [ $input , $value ] ;
                $results[$id] = $value;
            }
        }
        $this->validate($request, $validations);
        Answer::store($results , $form , $user , $ip);
        return view('message')->withTitle('اتمام')
                            ->withMessage('اطلاعات با موفقیت ثبت شد');


    }

    /**
     * sho answers to of form
     * @param  Form   $form 
     * @return 
     */
    public function show(Form $form)
    {

        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        $answers = $form->answers ;
        $results = [] ;
        foreach ($answers as $answer) {
            $inputs = [] ;            
            foreach (json_decode($answer->results) as $key => $value) {
                $inputs[Input::findOrFail($key)->label] = $value ;
            }
            $results[] = $inputs ;
        }

        dd($results);
        
    }
}
