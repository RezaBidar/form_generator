<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreInput;
use Gate;
use App\Form as Form;
use App\Input as Input;

class InputController extends Controller
{
    

    /**
     * redirect to form show
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        redirect()->route('form.show' , $request->form_id);
    }

    /**
     * Show the form for creating a new input field.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $form = Form::findOrFail($request->form_id);
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        switch($request->type)
        {
            case Input::TYPE_DATE :
                return view('input.date' , compact('form'));
                break ;
            case Input::TYPE_MULTISELECT :
                return view('input.multiselect' , compact('form'));
                break ;
            case Input::TYPE_TEXT :
                return view('input.text' , compact('form'));
                break ;
            case Input::TYPE_NUMBER :
                return view('input.number' , compact('form'));
                break ;

        }
        return 'type is invalid' ;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInput $request)
    {
        $form = Form::findOrFail($request->form_id);
        //Authorizing Actions
        if (Gate::denies('private-form', $form)) {
            return view('message')->withTitle('اجازه ندارید')->withMessage('شما سازنده ی این فرم نیستید و نمیتوانید اطلاعات این فرم را ببینید');
        }
        // dd($request->all());
        switch($request->type){
            case Input::TYPE_TEXT :
                $validation = $request->validation ;
                break ;
            case Input::TYPE_DATE :
                $from = ($request->from) ? strtotime(toGregorian($request->from)) : 'null' ;
                $to = ($request->to) ? strtotime(toGregorian($request->to)) : 'null' ;
                $validation = $from . '-' . $to;
                break;
            case Input::TYPE_NUMBER :
                $from = ($request->from) ? $request->from : 'null' ;
                $to = ($request->to) ? $request->to : 'null' ;
                $validation = $from . '-' . $to;
                break;
            case Input::TYPE_MULTISELECT :
                $validation = $request->choices ;
                break;
        }

        $input = new Input ;
        $input->label = $request->label ;
        $input->validation = $validation ;
        $input->required = $request->input('required' , false)  ;
        $input->type = $request->type ;
        $input->help = $request->help ;
        $input->form_id = $request->form_id ;
        $input->save();
        // dd($request->all() , $input);
        return redirect()->route('form.show' , ['form' => $input->form_id]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Input $input)
    {
        return redirect()->route('input.index' , ['form_id' => $input->from_id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Input $input)
    {
        return view('input.edit' , compact('input'));
    }

    /**
     * Update the field in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Input $input)
    {
        $input->update($request);
        return redirect()->route('index.show' , ['inputId' => $input->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Input $input)
    {
        // $input->delete();
        // redirect->route('form.show');
    }
}
